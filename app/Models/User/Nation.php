<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
