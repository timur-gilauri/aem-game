<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 22.05.2018
 * Time: 22:09
 */

namespace App\Entities\Stuff;


class BagItemEntity
{
    /** @var int */
    private $bag_id;
    /** @var int */
    private $item_id;
    /** @var string */
    private $item_type;
    /** @var int */
    private $amount;
    /** @var mixed */
    private $item;

    /**
     * @return int
     */
    public function getBagId(): int
    {
        return $this->bag_id;
    }

    /**
     * @param int $bag_id
     */
    public function setBagId(int $bag_id): void
    {
        $this->bag_id = $bag_id;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->item_id;
    }

    /**
     * @param int $item_id
     */
    public function setItemId(int $item_id): void
    {
        $this->item_id = $item_id;
    }

    /**
     * @return string
     */
    public function getItemType(): string
    {
        return $this->item_type;
    }

    /**
     * @param string $item_type
     */
    public function setItemType(string $item_type): void
    {
        $this->item_type = $item_type;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item): void
    {
        $this->item = $item;
    }

}