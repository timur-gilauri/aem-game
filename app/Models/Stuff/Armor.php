<?php

namespace App\Models\Stuff;

use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ItemPowerCategory::class, 'category_id', 'id');
    }
}
