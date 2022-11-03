<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalSize extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the animal specie that owns the size.
     */
    public function animalSpecie()
    {
        return $this->belongsTo(AnimalSpecie::class);
    }
}
