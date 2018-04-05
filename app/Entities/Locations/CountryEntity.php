<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.04.2018
 * Time: 0:32
 */

namespace App\Entities\Locations;


use App\Entities\User\NationEntity;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CountryEntity
{
    /** @var int|null */
    protected $id;
    /** @var string */
    protected $title;
    /** @var string */
    protected $slug;
    /** @var string */
    protected $description;
    /** @var null|Attachment|UploadedFile */
    protected $arms;
    /** @var null|Attachment|UploadedFile */
    protected $arms_shadow;
    /** @var NationEntity */
    protected $nation;
    /** @var Collection */
    protected $cities;

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
     * @return Attachment|null|UploadedFile
     */
    public function getArms()
    {
        return $this->arms;
    }

    /**
     * @param Attachment|null|UploadedFile $arms
     */
    public function setArms($arms): void
    {
        $this->arms = $arms;
    }

    /**
     * @return Attachment|null|UploadedFile
     */
    public function getArmsShadow()
    {
        return $this->arms_shadow;
    }

    /**
     * @param Attachment|null|UploadedFile $arms_shadow
     */
    public function setArmsShadow($arms_shadow): void
    {
        $this->arms_shadow = $arms_shadow;
    }

    /**
     * @return NationEntity
     */
    public function getNation(): NationEntity
    {
        return $this->nation;
    }

    /**
     * @param NationEntity $nation
     */
    public function setNation(NationEntity $nation): void
    {
        $this->nation = $nation;
    }

    /**
     * @return Collection
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    /**
     * @param Collection $cities
     */
    public function setCities(Collection $cities): void
    {
        $this->cities = $cities;
    }

}