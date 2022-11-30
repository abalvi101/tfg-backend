<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalSize;
use App\Models\AnimalSpecie;
use App\Models\Breed;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index() {
        $animals = Animal::all();
        return $this->sendResponse($animals, 'Lista de animales');
    }

    public function getFilteredAnimals(Request $request) {
        $animals = Animal::query()
        ->when($request->specie, function ($query, $specie) {
            $query->where('animal_specie_id', '=', $specie);
        })
        ->when($request->breed, function ($query, $breed) {
            $query->where('breed_id', '=', $breed);
        })
        ->when($request->size, function ($query, $size) {
            $query->where('size_id', '=', $size);
        })
        ->get();

        if (count($animals)) {
            return $this->sendResponse($animals, 'Lista de animales filtrada');
        } else {
            return $this->sendResponse($animals, 'No hay resultados');
        }
    }

    public function getAnimalSpecies() {
        $species = AnimalSpecie::all();
        return $this->sendResponse($species, 'Lista de especies de animales');
    }

    public function getAnimalBreeds() {
        $breeds = Breed::all();
        return $this->sendResponse($breeds, 'Lista de razas de animales');
    }

    public function getAnimalSizes() {
        $sizes = AnimalSize::all();
        return $this->sendResponse($sizes, 'Lista de tamaño de animales');
    }
}
