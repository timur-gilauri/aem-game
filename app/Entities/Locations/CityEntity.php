<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 12:08
 */

namespace App\Entities\Locations;


use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CityEntity
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $title;
    /** @var string */
    protected $slug;
    /** @var string */
    protected $description;
    /** @var int */
    protected $country_id;
    /** @var Attachment|UploadedFile|null */
    protected $image;
    /** @var int */
    protected $playersAmount;
    /** @var Collection */
    protected $locations;

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
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
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
     * @return int
     */
    public function getPlayersAmount(): int
    {
        return $this->playersAmount;
    }

    /**
     * @param int $playersAmount
     */
    public function setPlayersAmount(int $playersAmount): void
    {
        $this->playersAmount = $playersAmount;
    }

    /**
     * @return Collection
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    /**
     * @param Collection $locations
     */
    public function setLocations(Collection $locations): void
    {
        $this->locations = $locations;
    }


    public function getFirstLevelLocations()
    {
        return $this->getLocations()->filter(function (LocationEntity $location) {
            return !((bool)$location->getParentLocationId());
        });
    }

}