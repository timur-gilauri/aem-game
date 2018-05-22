<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.04.2018
 * Time: 15:54
 */

namespace App\Repositories\User;


use App\Entities\Stuff\BagItemEntity;
use App\Entities\User\BagEntity;
use App\Models\Stuff\BagItem;
use App\Models\User\Bag;
use App\Repositories\Stuff\BagItemRepository;
use Illuminate\Support\Collection;

class BagRepository
{
    /** @var BagItemRepository */
    protected $bagItemsRepo;

    public function __construct()
    {
        $this->bagItemsRepo = app(BagItemRepository::class);
    }

    public function all(): Collection
    {
        return Bag::all()->map(function (Bag $item) {
            return $this->toEntity($item);
        });
    }

    /**
     * @param int $id
     * @return BagEntity|null
     */
    public function find(int $id): BagEntity
    {
        $model = Bag::find($id);

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param int $userId
     * @return BagEntity|null
     */
    public function findByUserId(int $userId)
    {
        $model = Bag::where('user_id', $userId)->first();

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param Bag $model
     * @return BagEntity
     */
    public function toEntity(Bag $model): BagEntity
    {
        $entity = new BagEntity();

        $entity->setId($model->id);
        $entity->setPlayerId($model->player_id);
        $entity->setSize($model->size);
        $entity->setItems($model->items->map(function (BagItem $item) {
            return $this->bagItemsRepo->toEntity($item);
        }));

        return $entity;
    }

    public function save(BagEntity $entity)
    {
        $model = $entity->getId() ? Bag::find($entity->getId()) : new Bag();

        $model->size = $entity->getSize();

        $entity->getItems()->each(function (BagItemEntity $item) {
            $this->bagItemsRepo->save($item);
        });

        if ($model->save()) {
            if (!$entity->getId()) {
                $entity->setId($model->id);
            }

            return true;
        }

        return false;

    }
}