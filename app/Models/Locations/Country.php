<?php

namespace App\Models\Locations;

use App\Classes\Stapler\StaplerTrait;
use App\Models\User\Nation;
use App\Models\User\Player;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Country extends Model implements StaplerableInterface
{
    use StaplerTrait;

    protected $fillable = ['image', 'image_shadowed'];

    public function __construct(array $attributes = array())
    {

        $this->attach('image');
        $this->attach('image_shadowed');

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nation()
    {
        return $this->hasOne(Nation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
