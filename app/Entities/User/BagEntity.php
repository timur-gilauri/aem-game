<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 06.04.2018
 * Time: 15:54
 */

namespace App\Entities\User;


use Illuminate\Support\Collection;

class BagEntity
{
    /** @var int */
    protected $id;
    /** @var int */
    protected $player_id;
    /** @var int */
    protected $size;
    /** @var Collection */
    protected $elixir;
    /** @var Collection */
    protected $weapon;
    /** @var Collection */
    protected $armor;

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
    public function getElixir(): Collection
    {
        return $this->elixir;
    }

    /**
     * @param Collection $elixir
     */
    public function setElixir(Collection $elixir): void
    {
        $this->elixir = $elixir;
    }

    /**
     * @return Collection
     */
    public function getWeapon(): Collection
    {
        return $this->weapon;
    }

    /**
     * @param Collection $weapon
     */
    public function setWeapon(Collection $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * @return Collection
     */
    public function getArmor(): Collection
    {
        return $this->armor;
    }

    /**
     * @param Collection $armor
     */
    public function setArmor(Collection $armor): void
    {
        $this->armor = $armor;
    }

    /**
     * @return int
     */
    public function getItemsCount(): int
    {
        return $this->getElixir()->count() + $this->getWeapon()->count() + $this->getArmor()->count();
    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return $this->getItemsCount() == 0;

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
        if (!$this->full()) {
            $this->{$itemType}->push($item);
        }
    }
}