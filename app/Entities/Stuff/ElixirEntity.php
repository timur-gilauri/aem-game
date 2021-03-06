<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 05.04.2018
 * Time: 16:38
 */

namespace App\Entities\Stuff;


use Codesleeve\Stapler\Attachment;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ElixirEntity
{
    /** @var int|null */
    protected $id;
    /** @var string */
    protected $title;
    /** @var string */
    protected $description;
    /** @var string */
    protected $action_direction;
    /** @var int */
    protected $value;
    /** @var string */
    protected $scale;
    /** @var string */
    protected $target_param;
    /** @var int */
    protected $price;
    /** @var Attachment|UploadedFile|null */
    protected $image;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getActionDirection(): string
    {
        return $this->action_direction;
    }

    /**
     * @param string $action_direction
     */
    public function setActionDirection(string $action_direction): void
    {
        $this->action_direction = $action_direction;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getScale(): string
    {
        return $this->scale;
    }

    /**
     * @param string $scale
     */
    public function setScale(string $scale): void
    {
        $this->scale = $scale;
    }

    /**
     * @return string
     */
    public function getTargetParam(): string
    {
        return $this->target_param;
    }

    /**
     * @param string $target_param
     */
    public function setTargetParam(string $target_param): void
    {
        $this->target_param = $target_param;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Attachment|null|UploadedFile
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Attachment|null|UploadedFile $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

}