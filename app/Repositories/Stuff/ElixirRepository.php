<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 05.04.2018
 * Time: 16:38
 */

namespace App\Repositories\Stuff;


use App\Entities\Stuff\ElixirEntity;
use App\Models\Stuff\Elixir;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class ElixirRepository
{

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Elixir::all()->map(function (Elixir $model) {
            return $this->toEntity($model);
        });
    }

    /**
     * @param int $id
     * @return ElixirEntity|null
     */
    public function find(int $id)
    {
        return ($model = Elixir::find($id)) ? $this->toEntity($model) : null;
    }

    /**
     * @param Elixir $model
     * @return ElixirEntity
     */
    public function toEntity(Elixir $model): ElixirEntity
    {
        $entity = new ElixirEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setDescription($model->description);
        $entity->setActionDirection($model->action_direction);
        $entity->setPrice($model->price);
        $entity->setValue($model->value);
        $entity->setScale($model->scale);
        $entity->setTargetParam($model->target_param);
        $entity->setImage($model->image);

        return $entity;
    }

    /**
     * @param ElixirEntity $entity
     * @return bool
     */
    public function save(ElixirEntity $entity): bool
    {
        $model = $entity->getId() ? Elixir::find($entity->getId()) : new Elixir();

        $model->id = $entity->getId();
        $model->title = $entity->getTitle();
        $model->description = $entity->getDescription();
        $model->action_direction = $entity->getActionDirection();
        $model->price = $entity->getPrice();
        $model->value = $entity->getValue();
        $model->scale = $entity->getScale();
        $model->target_param = $entity->getTargetParam();


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