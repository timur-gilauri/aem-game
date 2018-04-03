<?php

namespace App\Models\User;

use App\Classes\Stapler\StaplerTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class PlayerClass extends Model implements StaplerableInterface
{
    use StaplerTrait;

    protected $fillable = ['image'];

    public function __construct(array $attributes = array())
    {

        $this->attach('image');

        parent::__construct($attributes);
    }
}
