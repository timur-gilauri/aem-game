<?php

namespace App\Models\User;

use App\Models\Stuff\BagItem;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{

    protected $fillable = [
        'player_id',
        'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(BagItem::class, 'bag_id', 'id');
    }
}
