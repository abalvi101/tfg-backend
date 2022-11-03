<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fostering extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['animal_id'];

    /**
     * Get the animal associated with the fostering.
     */
    public function animal()
    {
        return $this->hasOne(Animal::class);
    }

    /**
     * Get the city of the fostering.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the province of the fostering.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
