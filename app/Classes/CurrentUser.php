<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 21.05.2018
 * Time: 23:45
 */

namespace App\Classes;


use App\Entities\User\PlayerEntity;
use App\Models\User\User;
use Illuminate\Contracts\Auth\Authenticatable;

class CurrentUser
{
    /** @var User|Authenticatable */
    private $user;
    /** @var PlayerEntity */
    private $player;

    /**
     * @return User|Authenticatable
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|Authenticatable $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return PlayerEntity
     */
    public function getPlayer(): PlayerEntity
    {
        return $this->player;
    }

    /**
     * @param PlayerEntity $player
     */
    public function setPlayer(PlayerEntity $player): void
    {
        $this->player = $player;
    }

}