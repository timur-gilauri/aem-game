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
    protected $action_type;
    /** @var int */
    protected $price;
    /** @var int */
    protected $value;
    /** @var string */
    protected $scale;
    /** @var string */
    protected $group;
    /** @var string */
    protected $for_param;
    /** @var string */
    protected $size;
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
    public function getActionType(): string
    {
        return $this->action_type;
    }

    /**
     * @param string $action_type
     */
    public function setActionType(string $action_type): void
    {
        $this->action_type = $action_type;
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
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getForParam(): string
    {
        return $this->for_param;
    }

    /**
     * @param string $for_param
     */
    public function setForParam(string $for_param): void
    {
        $this->for_param = $for_param;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
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