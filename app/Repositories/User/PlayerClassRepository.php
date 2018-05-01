<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.04.2018
 * Time: 3:56
 */

namespace App\Repositories\User;


use App\Entities\User\PlayerClassEntity;
use App\Models\User\PlayerClass;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class PlayerClassRepository
{
    /**
     * @return Collection|static
     */
    public function all()
    {
        return PlayerClass::all()->map(function (PlayerClass $item) {
            return $this->toEntity($item);
        });
    }

    /**
     * @param int $id
     * @return PlayerClassEntity|null
     */
    public function find(int $id)
    {
        $model = PlayerClass::find($id);

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param PlayerClass $model
     * @return PlayerClassEntity
     */
    public function toEntity(PlayerClass $model): PlayerClassEntity
    {
        $entity = new PlayerClassEntity();

        $entity->setId($model->id);
        $entity->setTitle($model->title);
        $entity->setDescription($model->description);
        $entity->setClassAction($model->class_action);
        $entity->setScale($model->scale);
        $entity->setHealthUp($model->health_up);
        $entity->setPowerUp($model->power_up);
        $entity->setGuardUp($model->guard_up);
        $entity->setAgilityUp($model->agility_up);
        $entity->setMoneyUp($model->money_up);
        $entity->setSwordsUp($model->swords_up);
        $entity->setBowsUp($model->bows_up);
        $entity->setAxesUp($model->axes_up);
        $entity->setDaggersUp($model->daggers_up);
        $entity->setHealthUp($model->heavy_armor_up);
        $entity->setLightArmorUp($model->light_armor_up);
        $entity->setImage($model->image);

        return $entity;
    }

    /**
     * @param PlayerClassEntity $entity
     * @return bool
     */
    public function save(PlayerClassEntity $entity): bool
    {
        $model = $entity->getId() ? PlayerClass::find($entity->getId()) : new PlayerClass();

        $model->title = $entity->getTitle();
        $model->description = $entity->getDescription();
        $model->class_action = $entity->getClassAction();
        $model->scale = $entity->getScale();
        $model->money_up = $entity->getDaggersUp();
        $model->health_up = $entity->getHealthUp();
        $model->agility_up = $entity->getBowsUp();
        $model->power_up = $entity->getHealthUp();
        $model->guard_up = $entity->getAgilityUp();
        $model->swords_up = $entity->getGuardUp();
        $model->axes_up = $entity->getMoneyUp();
        $model->daggers_up = $entity->getAxesUp();
        $model->bows_up = $entity->getLightArmorUp();
        $model->light_armor_up = $entity->getPowerUp();
        $model->heavy_armor_up = $entity->getSwordsUp();


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