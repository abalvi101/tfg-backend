<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalDisease extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['animal_id'];

    /**
     * Get the animal that owns the disease.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
