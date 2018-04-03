<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 12:08
 */

namespace App\Entities\Locations;


use Codesleeve\Stapler\Attachment;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CityEntity
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $description;
    /** @var int */
    protected $country_id;
    /** @var Attachment|UploadedFile|null */
    protected $image;
    /** @var int */
    protected $playersAmount;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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

}