<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 04.04.2018
 * Time: 17:15
 */

namespace App\Repositories\Locations;


use App\Classes\Helpers\UrlHelper;
use App\Entities\Locations\LocationEntity;
use App\Models\Locations\Location;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class LocationRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Location::all()->map(function (Location $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param int $id
     * @return LocationEntity|null
     */
    public function find(int $id)
    {
        return ($model = Location::find($id)) ? $this->toEntity($model) : null;
    }

    /**
     * @param string $slug
     * @return LocationEntity|null
     */
    public function findBySlug(string $slug)
    {
        return ($model = Location::where('slug', $slug)->first()) ? $this->toEntity($model) : null;
    }

    /**
     * @param int $level
     * @return Collection
     */
    public function findForLevel(int $level): Collection
    {
        return Location::where('available_at_level', '<=', $level)->get()->map(function (Location $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param Location $model
     * @return LocationEntity
     */
    public function toEntity(Location $model): LocationEntity
    {
        $entity = new LocationEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setSlug($model->slug);
        $entity->setParentLocationId($model->parent_location_id);
        $entity->setAvailableAtLevel($model->available_at_level);
        $entity->setImage($model->image);

        $entity->setChildren($model->children->map(function (Location $child) {
            return $this->toEntity($child);
        }));

        return $entity;
    }

    public function save(LocationEntity $entity)
    {
        $model = $entity->getId() ? Location::find($entity->getId()) : new Location();

        $model->title = $entity->getTitle();

        if ($entity->getId() && ($entity->getSlug() != $model->slug)) {
            $model->slug = UrlHelper::transformTitleToUrl($entity->getTitle());
        }

        $model->parent_location_id = $entity->getParentLocationId();
        $model->available_at_level = $entity->getAvailableAtLevel();

        if (!($entity->getImage() instanceof Attachment) && !is_null($entity->getImage())) {
            $model->image = $entity->getImage();
        }


        if ($model->save()) {
            if (!$entity->getId()) {
                $entity->setId($model->id);
            }

            return true;
        }

        return false;
    }
}