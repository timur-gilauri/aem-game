<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.04.2018
 * Time: 0:32
 */

namespace App\Repositories\Locations;


use App\Classes\Helpers\UrlHelper;
use App\Entities\Locations\CountryEntity;
use App\Models\Locations\City;
use App\Models\Locations\Country;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class CountryRepository
{
    /** @var CityRepository */
    protected $cityRepo;
    /** @var NationRepository */
    protected $nationRepo;

    /**
     * CountryRepository constructor.
     */
    public function __construct()
    {
        $this->cityRepo = app(CityRepository::class);
        $this->nationRepo = app(NationRepository::class);
    }

    /**
     * @return Collection|static
     */
    public function all()
    {
        return Country::all()->map(function (Country $item) {
            return $this->toEntity($item);
        });
    }

    /**
     * @param int $id
     * @return CountryEntity|null
     */
    public function find(int $id)
    {
        return ($model = Country::find($id)) ? $this->toEntity($model) : null;
    }

    /**
     * @param string $slug
     * @return CountryEntity|null
     */
    public function findBySlug(string $slug)
    {
        return ($model = Country::where('slug', $slug)->first()) ? $this->toEntity($model) : null;
    }

    /**
     * @param Country $model
     * @return CountryEntity
     */
    public function toEntity(Country $model): CountryEntity
    {
        $entity = new CountryEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setSlug($model->slug);
        $entity->setDescription($model->description);
        $entity->setImage($model->image);
        $entity->setImageShadowed($model->image_shadowed);

        $entity->setNation($this->nationRepo->toEntity($model->nation));

        $entity->setCities($model->cities->map(function (City $item) {
            return $this->cityRepo->toEntity($item);
        }));

        return $entity;
    }

    /**
     * @param CountryEntity $entity
     * @return bool
     */
    public function save(CountryEntity $entity): bool
    {
        $model = $entity->getId() ? Country::find($entity->getId()) : new Country();

        $model->title = $entity->getTitle();

        if ($entity->getId() && ($entity->getSlug() != $model->slug)) {
            $model->slug = UrlHelper::transformTitleToUrl($entity->getTitle());
        }

        $model->description = $entity->getDescription();
        if (!($entity->getImage() instanceof Attachment) && !is_null($entity->getImage())) {
            $model->image = $entity->getImage();
        }
        if (!($entity->getImageShadowed() instanceof Attachment) && !is_null($entity->getImageShadowed())) {
            $model->image_shadowed = $entity->getImageShadowed();
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