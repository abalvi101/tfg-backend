<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;
    
    /**
     * Get the animal specie that owns the breed.
     */
    public function animalSpecie()
    {
        return $this->belongsTo(AnimalSpecie::class);
    }
}
