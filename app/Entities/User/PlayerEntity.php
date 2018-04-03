<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 0:06
 */

namespace App\Entities\User;


use App\Entities\Locations\CityEntity;
use App\Entities\Locations\CountryEntity;
use App\Entities\Locations\NationEntity;
use Codesleeve\Stapler\Attachment;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PlayerEntity
{

    /** @var int|null */
    protected $id;
    /** @var int */
    protected $user_id;
    /** @var string */
    protected $name;
    /** @var int */
    protected $nation_id;
    /** @var int */
    protected $city_id;
    /** @var int */
    protected $country_id;
    /** @var int */
    protected $player_class_id;
    /** @var int */
    protected $level;
    /** @var int */
    protected $experience;
    /** @var int */
    protected $health;
    /** @var int */
    protected $power;
    /** @var int */
    protected $damage;
    /** @var int */
    protected $defense;
    /** @var int */
    protected $agility;
    /** @var int */
    protected $money;
    /** @var int */
    protected $swords;
    /** @var int */
    protected $bows;
    /** @var int */
    protected $axes;
    /** @var int */
    protected $daggers;
    /** @var int */
    protected $hands;
    /** @var int */
    protected $heavy_armor;
    /** @var int */
    protected $light_armor;
    /** @var int|null */
    protected $active_weapon_id;
    /** @var int|null */
    protected $active_armor_id;
    /** @var int|null */
    protected $left_hand_accessory_id;
    /** @var int|null */
    protected $right_hand_accessory_id;
    /** @var int|null */
    protected $neck_accessory_id;
    /** @var int|null */
    protected $active_elixir_id;
    /** @var int */
    protected $restoring;
    /** @var Attachment|UploadedFile|null */
    protected $image;
    /** @var PlayerClassEntity */
    protected $player_class;
    /** @var CountryEntity */
    protected $country;
    /** @var NationEntity */
    protected $nation;
    /** @var CityEntity */
    protected $city;

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
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getNationId(): int
    {
        return $this->nation_id;
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
     * @param int $nation_id
     */
    public function setNationId(int $nation_id): void
    {
        $this->nation_id = $nation_id;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

    /**
     * @param int $city_id
     */
    public function setCityId(int $city_id): void
    {
        $this->city_id = $city_id;
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
     * @return int
     */
    public function getPlayerClassId(): int
    {
        return $this->player_class_id;
    }

    /**
     * @param int $player_class_id
     */
    public function setPlayerClassId(int $player_class_id): void
    {
        $this->player_class_id = $player_class_id;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     */
    public function setDefense(int $defense): void
    {
        $this->defense = $defense;
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->agility;
    }

    /**
     * @param int $agility
     */
    public function setAgility(int $agility): void
    {
        $this->agility = $agility;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @param int $money
     */
    public function setMoney(int $money): void
    {
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getSwords(): int
    {
        return $this->swords;
    }

    /**
     * @param int $swords
     */
    public function setSwords(int $swords): void
    {
        $this->swords = $swords;
    }

    /**
     * @return int
     */
    public function getBows(): int
    {
        return $this->bows;
    }

    /**
     * @param int $bows
     */
    public function setBows(int $bows): void
    {
        $this->bows = $bows;
    }

    /**
     * @return int
     */
    public function getAxes(): int
    {
        return $this->axes;
    }

    /**
     * @param int $axes
     */
    public function setAxes(int $axes): void
    {
        $this->axes = $axes;
    }

    /**
     * @return int
     */
    public function getDaggers(): int
    {
        return $this->daggers;
    }

    /**
     * @param int $daggers
     */
    public function setDaggers(int $daggers): void
    {
        $this->daggers = $daggers;
    }

    /**
     * @return int
     */
    public function getHands(): int
    {
        return $this->hands;
    }

    /**
     * @param int $hands
     */
    public function setHands(int $hands): void
    {
        $this->hands = $hands;
    }

    /**
     * @return int
     */
    public function getHeavyArmor(): int
    {
        return $this->heavy_armor;
    }

    /**
     * @param int $heavy_armor
     */
    public function setHeavyArmor(int $heavy_armor): void
    {
        $this->heavy_armor = $heavy_armor;
    }

    /**
     * @return int
     */
    public function getLightArmor(): int
    {
        return $this->light_armor;
    }

    /**
     * @param int $light_armor
     */
    public function setLightArmor(int $light_armor): void
    {
        $this->light_armor = $light_armor;
    }

    /**
     * @return int|null
     */
    public function getActiveWeaponId(): ?int
    {
        return $this->active_weapon_id;
    }

    /**
     * @param int|null $active_weapon_id
     */
    public function setActiveWeaponId(?int $active_weapon_id): void
    {
        $this->active_weapon_id = $active_weapon_id;
    }

    /**
     * @return int|null
     */
    public function getActiveArmorId(): ?int
    {
        return $this->active_armor_id;
    }

    /**
     * @param int|null $active_armor_id
     */
    public function setActiveArmorId(?int $active_armor_id): void
    {
        $this->active_armor_id = $active_armor_id;
    }

    /**
     * @return int|null
     */
    public function getLeftHandAccessoryId(): ?int
    {
        return $this->left_hand_accessory_id;
    }

    /**
     * @param int|null $left_hand_accessory_id
     */
    public function setLeftHandAccessoryId(?int $left_hand_accessory_id): void
    {
        $this->left_hand_accessory_id = $left_hand_accessory_id;
    }

    /**
     * @return int|null
     */
    public function getRightHandAccessoryId(): ?int
    {
        return $this->right_hand_accessory_id;
    }

    /**
     * @param int|null $right_hand_accessory_id
     */
    public function setRightHandAccessoryId(?int $right_hand_accessory_id): void
    {
        $this->right_hand_accessory_id = $right_hand_accessory_id;
    }

    /**
     * @return int|null
     */
    public function getNeckAccessoryId(): ?int
    {
        return $this->neck_accessory_id;
    }

    /**
     * @param int|null $neck_accessory_id
     */
    public function setNeckAccessoryId(?int $neck_accessory_id): void
    {
        $this->neck_accessory_id = $neck_accessory_id;
    }

    /**
     * @return int|null
     */
    public function getActiveElixirId(): ?int
    {
        return $this->active_elixir_id;
    }

    /**
     * @param int|null $active_elixir_id
     */
    public function setActiveElixirId(?int $active_elixir_id): void
    {
        $this->active_elixir_id = $active_elixir_id;
    }

    /**
     * @return int
     */
    public function getRestoring(): int
    {
        return $this->restoring ?? 0;
    }

    /**
     * @param int $restoring
     */
    public function setRestoring(int $restoring = 0): void
    {
        $this->restoring = $restoring;
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
     * @return PlayerClassEntity
     */
    public function getPlayerClass(): PlayerClassEntity
    {
        return $this->player_class;
    }

    /**
     * @param PlayerClassEntity $player_class
     */
    public function setPlayerClass(PlayerClassEntity $player_class): void
    {
        $this->player_class = $player_class;
    }

    /**
     * @return CountryEntity
     */
    public function getCountry(): CountryEntity
    {
        return $this->country;
    }

    /**
     * @param CountryEntity $country
     */
    public function setCountry(CountryEntity $country): void
    {
        $this->country = $country;
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
     * @return CityEntity
     */
    public function getCity(): CityEntity
    {
        return $this->city;
    }

    /**
     * @param CityEntity $city
     */
    public function setCity(CityEntity $city): void
    {
        $this->city = $city;
    }


}
