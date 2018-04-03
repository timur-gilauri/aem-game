<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 12:14
 */

namespace App\Repositories\Locations;


use App\Entities\Locations\CityEntity;
use App\Models\Locations\City;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class CityRepository
{

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
     * @param City $model
     * @return CityEntity
     */
    public function toEntity(City $model)
    {
        $entity = new CityEntity();

        $entity->setId($model->id);
        $entity->setName($model->name);
        $entity->setDescription($model->description);
        $entity->setCountryId($model->country_id);
        $entity->setImage($model->image);
        $entity->setPlayersAmount($model->players->count());

        return $entity;
    }

    public function save(CityEntity $entity)
    {
        $model = $entity->getId() ? City::find($entity->getId()) : new City();

        $model->name = $entity->getName();
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