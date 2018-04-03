<?php

namespace App\Models\Locations;

use App\Classes\Stapler\StaplerTrait;
use App\Models\User\Player;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements StaplerableInterface
{
    use StaplerTrait;

    protected $fillable = ['image'];

    public function __construct(array $attributes = [])
    {
        $this->attach('image');

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
