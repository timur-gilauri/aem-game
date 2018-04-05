<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 12:14
 */

namespace App\Repositories\Locations;


use App\Classes\Helpers\UrlHelper;
use App\Entities\Locations\CityEntity;
use App\Models\Locations\City;
use App\Models\Locations\Location;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class CityRepository
{
    /** @var LocationRepository */
    protected $locationRepo;

    public function __construct()
    {
        $this->locationRepo = app(LocationRepository::class);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return City::all()->map(function (City $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param int $id
     * @return CityEntity|null
     */
    public function find(int $id)
    {
        return ($model = City::find($id)) ? $this->toEntity($model) : null;
    }

    /**
     * @param string $slug
     * @return CityEntity|null
     */
    public function findBySlug(string $slug)
    {
        return ($model = City::where('slug', $slug)->first()) ? $this->toEntity($model) : null;
    }

    /**
     * @param City $model
     * @return CityEntity
     */
    public function toEntity(City $model)
    {
        $entity = new CityEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setSlug($model->slug);
        $entity->setDescription($model->description);
        $entity->setCountryId($model->country_id);
        $entity->setImage($model->image);
        $entity->setPlayersAmount($model->players->count());
        $entity->setLocations($model->locations->map(function (Location $item) {
            return $this->locationRepo->toEntity($item);
        }));


        return $entity;
    }

    public function save(CityEntity $entity)
    {
        $model = $entity->getId() ? City::find($entity->getId()) : new City();

        $model->title = $entity->getTitle();

        if ($entity->getId() && ($entity->getSlug() != $model->slug)) {
            $model->slug = UrlHelper::transformTitleToUrl($entity->getTitle());
        }
        $model->description = $entity->getDescription();
        $model->country_id = $entity->getCountryId();

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