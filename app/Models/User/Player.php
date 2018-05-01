<?php

namespace App\Models\User;

use App\Models\Locations\City;
use App\Models\Locations\Country;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bag()
    {
        return $this->hasOne(Bag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nation()
    {
        return $this->belongsTo(Nation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player_class()
    {
        return $this->belongsTo(PlayerClass::class, 'player_class_id', 'id');
    }
}
