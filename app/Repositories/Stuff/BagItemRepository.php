<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 22.05.2018
 * Time: 22:09
 */

namespace App\Repositories\Stuff;


use App\Entities\Stuff\BagItemEntity;
use App\Models\Stuff\BagItem;

class BagItemRepository
{

    private $repos;

    public function __construct()
    {
        $this->repos = [
            'armor'  => app(ArmorRepository::class),
            'elixir' => app(ElixirRepository::class),
            'weapon' => app(WeaponRepository::class),
        ];
    }

    public function toEntity(BagItem $model)
    {
        $entity = new BagItemEntity();

        $entity->setBagId($model->bag_id);
        $entity->setItemId($model->item_id);
        $entity->setItemType($model->item_type);
        $entity->setAmount($model->amount);
        $entity->setItem($this->repos[$model->item_type]->find($model->item_id));

        return $entity;
    }

    public function save(BagItemEntity $entity)
    {
        $model = BagItem::where('bag_id', $entity->getBagId())->where('item_id', $entity->getItemId())->first() ?? new BagItem();

        $model->bag_id = $entity->getBagId();
        $model->item_id = $entity->getItemId();
        $model->item_type = $entity->getItemType();
        $model->amount = $entity->getAmount();

        if ($model->save()) {
            return true;
        }

        return false;
    }
}