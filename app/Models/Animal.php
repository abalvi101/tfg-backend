<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'entry_date',
        'province_id',
        'city_id',
        'animal_specie_id',
        'breed_id',
        'size_id',
        'weight',
        'gender',
        'neutered',
        'color',
        'description',
        'image',
    ];

    /**
     * Get the association of the animal.
     */
    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    /**
     * Get the breed of the animal.
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * Get the size of the animal.
     */
    public function size()
    {
        return $this->belongsTo(AnimalSize::class);
    }

    /**
     * Get the specie of the animal.
     */
    public function specie()
    {
        return $this->belongsTo(AnimalSpecie::class, 'animal_specie_id');
    }

    /**
     * Get the city of the animal.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the province of the animal.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get the diseases of the animal.
     */
    public function diseases()
    {
        return $this->hasMany(AnimalDisease::class, 'animal_id');
    }

    /**
     * Get the fostering associated with the animal.
     */
    public function fostering()
    {
        return $this->hasOne(Fostering::class);
    }
}
