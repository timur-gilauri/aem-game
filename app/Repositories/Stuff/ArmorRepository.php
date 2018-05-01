<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 05.04.2018
 * Time: 23:18
 */

namespace App\Repositories\Stuff;


use App\Entities\Stuff\ArmorEntity;
use App\Models\Stuff\Armor;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class ArmorRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Armor::all()->map(function (Armor $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param int $id
     * @return ArmorEntity|null
     */
    public function find(int $id)
    {
        return ($model = Armor::find($id)) ? $this->toEntity($model) : null;
    }

    /**
     * @param Armor $model
     * @return ArmorEntity
     */
    public function toEntity(Armor $model): ArmorEntity
    {
        $entity = new ArmorEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setDescription($model->description);
        $entity->setPrice($model->price);
        $entity->setValue($model->value);
        $entity->setEndurance($model->endurance);
        $entity->setCategoryId($model->category_id);
        $entity->setImage($model->image);
        $entity->setCategory($model->category->level);

        return $entity;
    }

    public function save(ArmorEntity $entity)
    {
        $model = $entity->getId() ? Armor::find($entity->getId()) : new Armor();

        $model->title = $entity->getTitle();
        $model->description = $entity->getDescription();
        $model->price = $entity->getPrice();
        $model->value = $entity->getValue();
        $model->endurance = $entity->getEndurance();
        $model->category_id = $entity->getCategoryId();


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