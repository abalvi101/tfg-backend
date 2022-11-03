<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalSpecie extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the sizes of the specie.
     */
    public function sizes()
    {
        return $this->hasMany(AnimalSize::class);
    }
    
    /**
     * Get the breeds of the specie.
     */
    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
}
