<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 1:01
 */

namespace App\Repositories\Locations;


use App\Entities\User\NationEntity;
use App\Models\User\Nation;
use Illuminate\Support\Collection;

class NationRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Nation::all()->map(function (Nation $model) {
            return $this->toEntity($model);
        });
    }


    public function toEntity(Nation $model): NationEntity
    {
        $entity = new NationEntity();

        $entity->setId($model->id);
        $entity->setName($model->name);
        $entity->setDescription($model->description);

        return $entity;
    }

    /**
     * @param NationEntity $entity
     * @return bool
     */
    public function save(NationEntity $entity): bool
    {
        $model = $entity->getId() ? Nation::find($entity->getId()) : new Nation();

        $model->name = $entity->getName();
        $model->description = $entity->getDescription();

        if ($model->save()) {
            if (!$entity->getId()) {
                $entity->setId($model->id);
            }

            return true;
        }

        return false;
    }

}