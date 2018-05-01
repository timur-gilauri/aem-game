<?php

namespace App\Models\User;

use App\Models\Stuff\Armor;
use App\Models\Stuff\Elixir;
use App\Models\Stuff\Weapon;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function elixirs()
    {
        return $this->belongsToMany(Elixir::class, 'bag_elixir');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function weapons()
    {
        return $this->belongsToMany(Weapon::class, 'bag_weapon');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function armors()
    {
        return $this->belongsToMany(Armor::class, 'armor_bag');
    }
}
