<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.04.2018
 * Time: 3:56
 */

namespace App\Entities\User;


use Codesleeve\Stapler\Attachment;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PlayerClassEntity
{

    /** @var int|null */
    protected $id;
    /** @var string */
    protected $title;
    /** @var string */
    protected $description;
    /** @var string */
    protected $class_action;
    /** @var string */
    protected $scale;
    /** @var int */
    protected $health_up;
    /** @var int */
    protected $power_up;
    /** @var int */
    protected $guard_up;
    /** @var int */
    protected $agility_up;
    /** @var int */
    protected $money_up;
    /** @var int */
    protected $swords_up;
    /** @var int */
    protected $bows_up;
    /** @var int */
    protected $axes_up;
    /** @var int */
    protected $daggers_up;
    /** @var int */
    protected $heavy_armor_up;
    /** @var int */
    protected $light_armor_up;
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
    public function getClassAction(): string
    {
        return $this->class_action;
    }

    /**
     * @param string $class_action
     */
    public function setClassAction(string $class_action): void
    {
        $this->class_action = $class_action;
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
     * @return int
     */
    public function getHealthUp(): int
    {
        return $this->health_up;
    }

    /**
     * @param int $health_up
     */
    public function setHealthUp(int $health_up): void
    {
        $this->health_up = $health_up;
    }

    /**
     * @return int
     */
    public function getPowerUp(): int
    {
        return $this->power_up;
    }

    /**
     * @param int $power_up
     */
    public function setPowerUp(int $power_up): void
    {
        $this->power_up = $power_up;
    }

    /**
     * @return int
     */
    public function getGuardUp(): int
    {
        return $this->guard_up;
    }

    /**
     * @param int $guard_up
     */
    public function setGuardUp(int $guard_up): void
    {
        $this->guard_up = $guard_up;
    }

    /**
     * @return int
     */
    public function getAgilityUp(): int
    {
        return $this->agility_up;
    }

    /**
     * @param int $agility_up
     */
    public function setAgilityUp(int $agility_up): void
    {
        $this->agility_up = $agility_up;
    }

    /**
     * @return int
     */
    public function getMoneyUp(): int
    {
        return $this->money_up;
    }

    /**
     * @param int $money_up
     */
    public function setMoneyUp(int $money_up): void
    {
        $this->money_up = $money_up;
    }

    /**
     * @return int
     */
    public function getSwordsUp(): int
    {
        return $this->swords_up;
    }

    /**
     * @param int $swords_up
     */
    public function setSwordsUp(int $swords_up): void
    {
        $this->swords_up = $swords_up;
    }

    /**
     * @return int
     */
    public function getBowsUp(): int
    {
        return $this->bows_up;
    }

    /**
     * @param int $bows_up
     */
    public function setBowsUp(int $bows_up): void
    {
        $this->bows_up = $bows_up;
    }

    /**
     * @return int
     */
    public function getAxesUp(): int
    {
        return $this->axes_up;
    }

    /**
     * @param int $axes_up
     */
    public function setAxesUp(int $axes_up): void
    {
        $this->axes_up = $axes_up;
    }

    /**
     * @return int
     */
    public function getDaggersUp(): int
    {
        return $this->daggers_up;
    }

    /**
     * @param int $daggers_up
     */
    public function setDaggersUp(int $daggers_up): void
    {
        $this->daggers_up = $daggers_up;
    }

    /**
     * @return int
     */
    public function getHeavyArmorUp(): int
    {
        return $this->heavy_armor_up;
    }

    /**
     * @param int $heavy_armor_up
     */
    public function setHeavyArmorUp(int $heavy_armor_up): void
    {
        $this->heavy_armor_up = $heavy_armor_up;
    }

    /**
     * @return int
     */
    public function getLightArmorUp(): int
    {
        return $this->light_armor_up;
    }

    /**
     * @param int $light_armor_up
     */
    public function setLightArmorUp(int $light_armor_up): void
    {
        $this->light_armor_up = $light_armor_up;
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