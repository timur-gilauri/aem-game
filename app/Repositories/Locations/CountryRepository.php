<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.04.2018
 * Time: 0:32
 */

namespace App\Repositories\Locations;


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
        $model = Country::find($id);

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param Country $model
     * @return CountryEntity
     */
    public function toEntity(Country $model): CountryEntity
    {
        $entity = new CountryEntity();

        $entity->setId($model->id);
        $entity->setName($model->name);
        $entity->setTitle($model->title);
        $entity->setDescription($model->description);
        $entity->setArms($model->arms);
        $entity->setArmsShadow($model->arms_shadow);

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

        $model->name = $entity->getName();
        $model->title = $entity->getTitle();
        $model->description = $entity->getDescription();
        if (!($entity->getArms() instanceof Attachment) && !is_null($entity->getArms())) {
            $model->arms = $entity->getArms();
        }
        if (!($entity->getArmsShadow() instanceof Attachment) && !is_null($entity->getArmsShadow())) {
            $model->arms_shadow = $entity->getArmsShadow();
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