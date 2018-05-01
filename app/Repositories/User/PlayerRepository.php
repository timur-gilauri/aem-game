<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 03.04.2018
 * Time: 0:03
 */

namespace App\Repositories\User;


use App\Entities\User\PlayerEntity;
use App\Models\User\Player;
use App\Repositories\Locations\CityRepository;
use App\Repositories\Locations\CountryRepository;
use App\Repositories\Locations\NationRepository;
use Codesleeve\Stapler\Attachment;
use Illuminate\Support\Collection;

class PlayerRepository
{
    /** @var BagRepository */
    protected $bagRepo;
    /** @var CityRepository */
    protected $cityRepo;
    /** @var NationRepository */
    protected $nationRepo;
    /** @var CountryRepository */
    protected $countryRepo;
    /** @var PlayerClassRepository */
    protected $playerClassRepo;

    public function __construct()
    {
        $this->bagRepo = app(BagRepository::class);
        $this->cityRepo = app(CityRepository::class);
        $this->nationRepo = app(NationRepository::class);
        $this->countryRepo = app(CountryRepository::class);
        $this->playerClassRepo = app(PlayerClassRepository::class);
    }

    /**
     * @return Collection|static
     */
    public function all()
    {
        return Player::all()->map(function (Player $item) {
            return $this->toEntity($item);
        });
    }

    /**
     * @param int $id
     * @return PlayerEntity|null
     */
    public function find(int $id): PlayerEntity
    {
        $model = Player::find($id);

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param int $userId
     * @return PlayerEntity|null
     */
    public function findByUserId(int $userId)
    {
        $model = Player::where('user_id', $userId)->first();

        return $model ? $this->toEntity($model) : null;
    }

    /**
     * @param Player $model
     * @return PlayerEntity
     */
    public function toEntity(Player $model): PlayerEntity
    {
        $entity = new PlayerEntity();

        $entity->setId($model->id);
        $entity->setUserId($model->user_id);
        $entity->setName($model->name);
        $entity->setNationId($model->nation_id);
        $entity->setCityId($model->city_id);
        $entity->setCountryId($model->country_id);
        $entity->setPlayerClassId($model->player_class_id);
        $entity->setLevel($model->level);
        $entity->setExperience($model->experience);
        $entity->setHealth($model->health);
        $entity->setPower($model->power);
        $entity->setDamage($model->damage);
        $entity->setDefense($model->defense);
        $entity->setAgility($model->agility);
        $entity->setMoney($model->money);
        $entity->setSwords($model->swords);
        $entity->setBows($model->bows);
        $entity->setAxes($model->axes);
        $entity->setDaggers($model->daggers);
        $entity->setHands($model->hands);
        $entity->setHeavyArmor($model->heavy_armor);
        $entity->setLightArmor($model->light_armor);
        $entity->setActiveWeaponId($model->active_weapon_id);
        $entity->setActiveArmorId($model->active_armor_id);
        $entity->setLeftHandAccessoryId($model->left_hand_accessory_id);
        $entity->setRightHandAccessoryId($model->right_hand_accessory_id);
        $entity->setNeckAccessoryId($model->neck_accessory_id);
        $entity->setActiveElixirId($model->active_elixir_id);
        $entity->setRestoring($model->restoring);
        $entity->setImage($model->image);
        $entity->setPlayerClass($this->playerClassRepo->toEntity($model->player_class));
        $entity->setCity($this->cityRepo->toEntity($model->city));
        $entity->setCountry($this->countryRepo->toEntity($model->country));
        $entity->setNation($this->nationRepo->toEntity($model->nation));
        $entity->setBag($this->bagRepo->toEntity($model->bag));

        return $entity;
    }

    /**
     * @param PlayerEntity $entity
     * @return bool
     */
    public function save(PlayerEntity $entity): bool
    {
        $model = $entity->getId() ? Player::find($entity->getId()) : new Player();

        $model->user_id = $entity->getUserId();
        $model->name = $entity->getName();
        $model->nation_id = $entity->getNationId();
        $model->city_id = $entity->getCityId();
        $model->country_id = $entity->getCountryId();
        $model->player_class_id = $entity->getPlayerClassId();
        $model->level = $entity->getLevel();
        $model->experience = $entity->getExperience();
        $model->health = $entity->getHealth();
        $model->power = $entity->getPower();
        $model->damage = $entity->getDamage();
        $model->defense = $entity->getDefense();
        $model->agility = $entity->getAgility();
        $model->money = $entity->getMoney();
        $model->swords = $entity->getSwords();
        $model->bows = $entity->getBows();
        $model->axes = $entity->getAxes();
        $model->daggers = $entity->getDaggers();
        $model->hands = $entity->getHands();
        $model->heavy_armor = $entity->getHeavyArmor();
        $model->light_armor = $entity->getLightArmor();
        $model->active_weapon_id = $entity->getActiveWeaponId();
        $model->active_armor_id = $entity->getActiveArmorId();
        $model->left_hand_accessory_id = $entity->getLeftHandAccessoryId();
        $model->right_hand_accessory_id = $entity->getRightHandAccessoryId();
        $model->neck_accessory_id = $entity->getNeckAccessoryId();
        $model->active_elixir_id = $entity->getActiveElixirId();
        $model->restoring = $entity->getRestoring() ?? 0;

        if (!($entity->getImage() instanceof Attachment) && !is_null($entity->getImage())) {
            $model->image = $entity->getImage();
        }

        if ($model->save()) {
            if (!$entity->getId()) {
                $entity->setId($model->id);
            }

            return true;
        }

        return false;

    }
}