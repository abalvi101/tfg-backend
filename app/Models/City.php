<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the province that owns the city.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get the users of the city.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the animals of the city.
     */
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
