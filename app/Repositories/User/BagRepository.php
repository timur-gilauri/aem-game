<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.04.2018
 * Time: 15:54
 */

namespace App\Repositories\User;


use App\Entities\Stuff\ArmorEntity;
use App\Entities\Stuff\ElixirEntity;
use App\Entities\Stuff\WeaponEntity;
use App\Entities\User\BagEntity;
use App\Models\Stuff\Armor;
use App\Models\Stuff\Elixir;
use App\Models\Stuff\Weapon;
use App\Models\User\Bag;
use App\Repositories\Stuff\ArmorRepository;
use App\Repositories\Stuff\ElixirRepository;
use App\Repositories\Stuff\WeaponRepository;
use Illuminate\Support\Collection;

class BagRepository
{
    /** @var ArmorRepository */
    protected $armorRepo;
    /** @var ElixirRepository */
    protected $elixirRepo;
    /** @var WeaponRepository */
    protected $weaponRepo;

    public function __construct()
    {
        $this->armorRepo = app(ArmorRepository::class);
        $this->elixirRepo = app(ElixirRepository::class);
        $this->weaponRepo = app(WeaponRepository::class);
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
        $entity->setElixir($model->elixirs->map(function (Elixir $item) {
            return $this->elixirRepo->toEntity($item);
        }));
        $entity->setWeapon($model->weapons->map(function (Weapon $item) {
            return $this->weaponRepo->toEntity($item);
        }));
        $entity->setArmor($model->armors->map(function (Armor $item) {
            return $this->armorRepo->toEntity($item);
        }));

        return $entity;
    }

    public function save(BagEntity $entity)
    {
        $model = $entity->getId() ? Bag::find($entity->getId()) : new Bag();

        $model->size = $entity->getSize();

        $model->elixirs()->sync($entity->getElixir()->map(function (ElixirEntity $item) {
            return $item->getId();
        }));

        $model->armors()->sync($entity->getArmor()->map(function (ArmorEntity $item) {
            return $item->getId();
        }));
        $model->weapons()->sync($entity->getWeapon()->map(function (WeaponEntity $item) {
            return $item->getId();
        }));

        if ($model->save()) {
            if (!$entity->getId()) {
                $entity->setId($model->id);
            }

            return true;
        }

        return false;

    }
}