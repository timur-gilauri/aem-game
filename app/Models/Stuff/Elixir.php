<?php

namespace App\Models\Stuff;

use App\Classes\Stapler\StaplerTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Elixir extends Model implements StaplerableInterface
{
    use StaplerTrait;

    protected $fillable = ['image'];

    public function __construct(array $attributes = [])
    {
        $this->attach('image');
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ItemPowerCategory::class, 'category_id', 'id');
    }
}
