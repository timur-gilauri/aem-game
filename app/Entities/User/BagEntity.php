<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.04.2018
 * Time: 15:54
 */

namespace App\Entities\User;


use App\Entities\Stuff\BagItemEntity;
use Illuminate\Support\Collection;

class BagEntity
{
    /** @var int */
    private $id;
    /** @var int */
    private $player_id;
    /** @var int */
    private $size;
    /** @var Collection */
    private $items;
    /** @var Collection */
    private $elixir;
    /** @var Collection */
    private $weapon;
    /** @var Collection */
    private $armor;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->player_id;
    }

    /**
     * @param int $player_id
     */
    public function setPlayerId(int $player_id): void
    {
        $this->player_id = $player_id;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    /**
     * @return Collection
     */
    public function getElixirs(): Collection
    {
        return $this->getItems()->filter(function (BagItemEntity $item) {
            return $item->getItemType() == 'elixir';
        });
    }


    /**
     * @return Collection
     */
    public function getWeapons(): Collection
    {
        return $this->getItems()->filter(function (BagItemEntity $item) {
            return $item->getItemType() == 'weapon';
        });
    }

    /**
     * @return Collection
     */
    public function getArmors(): Collection
    {
        return $this->getItems()->filter(function (BagItemEntity $item) {
            return $item->getItemType() == 'armor';
        });
    }

    /**
     * @return int
     */
    public function getItemsCount(): int
    {
        return $this->getItems()->count();
    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return $this->getItems()->isEmpty();

    }

    /**
     * @return bool
     */
    public function full(): bool
    {
        return $this->getItemsCount() >= $this->getSize();
    }

    /**
     * @param string $itemType
     * @param $item
     */
    public function addItem(string $itemType, $item): void
    {
        /** @var BagItemEntity $bagItem */
        $bagItem = $this->getItems()->filter(function (BagItemEntity $bagItemEntity) use ($item, $itemType) {
            return ($bagItemEntity->getItemType() == $itemType) && ($bagItemEntity->getItemId() == $item->getId());
        })->first();
        if (!$bagItem) {
            $bagItem = new BagItemEntity();

            $bagItem->setBagId($this->getId());
            $bagItem->setItemId($item->getId());
            $bagItem->setItemType($itemType);
            $bagItem->setAmount(1);

            $this->items->push($bagItem);
        } else {
            $bagItem->setAmount($bagItem->getAmount() + 1);
        }
    }
}