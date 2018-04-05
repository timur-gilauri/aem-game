<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 04.04.2018
 * Time: 17:13
 */

namespace App\Entities\Locations;


use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LocationEntity
{
    /** @var int|null */
    protected $id;
    /** @var int */
    protected $parent_location_id;
    /** @var string */
    protected $slug;
    /** @var string */
    protected $title;
    /** @var int */
    protected $available_at_level;
    /** @var Attachment|UploadedFile|null */
    protected $image;
    /** @var Collection */
    protected $children;

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
     * @return int
     */
    public function getParentLocationId(): int
    {
        return $this->parent_location_id;
    }

    /**
     * @param int $parent_location_id
     */
    public function setParentLocationId(int $parent_location_id): void
    {
        $this->parent_location_id = $parent_location_id;
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
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }


    /**
     * @return int
     */
    public function getAvailableAtLevel(): int
    {
        return $this->available_at_level;
    }

    /**
     * @param int $available_at_level
     */
    public function setAvailableAtLevel(int $available_at_level): void
    {
        $this->available_at_level = $available_at_level;
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

    /**
     * @return Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @param Collection $children
     */
    public function setChildren(Collection $children): void
    {
        $this->children = $children;
    }


}