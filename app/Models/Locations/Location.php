<?php

namespace App\Models\Locations;

use App\Classes\Stapler\StaplerTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Location extends Model implements StaplerableInterface
{
    use StaplerTrait;

    protected $fillable = ['image'];

    public const TYPES = [
        'market'    => 'market',
        'territory' => 'territory',
    ];

    public function __construct(array $attributes = [])
    {
        $this->attach('image');

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Location::class, 'parent_location_id', 'id');
    }

}
