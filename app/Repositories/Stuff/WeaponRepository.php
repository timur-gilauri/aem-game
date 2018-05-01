<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 05.04.2018
 * Time: 23:23
 */

namespace App\Repositories\Stuff;


use App\Entities\Stuff\WeaponEntity;
use App\Models\Stuff\Weapon;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class WeaponRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Weapon::all()->map(function (Weapon $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param int $id
     * @return WeaponEntity|null
     */
    public function find(int $id)
    {
        return ($model = Weapon::find($id)) ? $this->toEntity($model) : null;
    }

    public function findByType(string $type)
    {

    }

    /**
     * @param Weapon $model
     * @return WeaponEntity
     */
    public function toEntity(Weapon $model): WeaponEntity
    {
        $entity = new WeaponEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setDescription($model->description);
        $entity->setPrice($model->price);
        $entity->setValue($model->value);
        $entity->setEndurance($model->endurance);
        $entity->setCategoryId($model->category_id);
        $entity->setType($model->type);
        $entity->setImage($model->image);
        $entity->setCategory($model->category->level);

        return $entity;
    }

    public function save(WeaponEntity $entity)
    {
        $model = $entity->getId() ? Weapon::find($entity->getId()) : new Weapon();

        $model->title = $entity->getTitle();
        $model->description = $entity->getDescription();
        $model->price = $entity->getPrice();
        $model->value = $entity->getValue();
        $model->endurance = $entity->getEndurance();
        $model->category_id = $entity->getCategoryId();
        $model->type = $entity->getType();


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