<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the cities of the province.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Get the users of the province.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the animals of the province.
     */
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
