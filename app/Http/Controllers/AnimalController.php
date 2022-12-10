<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use App\Http\Resources\AnimalsListResource;
use App\Models\Animal;
use App\Models\AnimalSize;
use App\Models\AnimalSpecie;
use App\Models\Association;
use App\Models\Breed;
use App\Models\Fostering;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index() {
        $animals = Animal::all();
        return $this->sendResponse($animals, 'Lista de animales');
    }

    public function getFilteredAnimals(Request $request) {
        // dd($request->all());
        $animals = AnimalsListResource::collection(
            Animal::query()
            ->when($request->specie, function ($query, $specie) {
                $query->where('animal_specie_id', '=', $specie);
            })
            ->when($request->breed, function ($query, $breed) {
                $query->where('breed_id', '=', $breed);
            })
            ->when($request->size, function ($query, $size) {
                $query->where('size_id', '=', $size);
            })
            ->when($request->province, function ($query, $province) {
                $query->where('province_id', '=', $province);
            })
            ->when($request->city, function ($query, $city) {
                $query->where('city_id', '=', $city);
            })
            ->when(isset($request->neutered), function ($query, $neutered) {
                $query->where('neutered', $neutered === "true" ? true : false);
            })
            ->when(isset($request->gender), function ($query, $gender) {
                $query->where('gender', $gender === "true" ? true : false);
            })
            ->get()
        );

        if (count($animals)) {
            return $this->sendResponse($animals, 'Lista de animales filtrada');
        } else {
            return $this->sendResponse($animals, 'No hay resultados');
        }
    }

    public function getAnimalInfo(Request $request) {
        $animal = new AnimalResource(Animal::find($request->animal_id));
        if ($animal) {
            $animal['owner'] = false;
            $user = auth('sanctum')->user();
            if ($user && class_basename($user) === 'Association' && $animal->association_id === $user->id) {
                $animal['owner'] = true;
            }
            return $this->sendResponse($animal, 'Datos del animal');
        }
        return $this->sendResponse($animal, 'No hay resultados');
    }

    public function create(Request $request) {
        $data = $request->all();
        $association = auth('sanctum')->user();
        if (!$association || class_basename($association) !== 'Association') {
            return $this->sendError('Operación no autorizada', 'Operación no autorizada', 401);
        }

        $animal = new Animal;
        $animal->fill($data);
        $animal['association_id'] = $association->id;
        $animal->save();

        return $this->sendResponse($animal, 'Animal creado correctamente');
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

    /**
     * update animal data
     */
    public function update(Request $request)
    {
        $association = auth('sanctum')->user();
        if (class_basename($association) === 'Association' && Animal::find($request->id)->association_id === $association->id) {
            Animal::whereId($request->id)->update($request->data);
            $animal = Animal::find($request->id);
            return $this->sendResponse($animal, 'Datos actualizados correctamente.');
        }
        return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
    }

    /**
     * Update the animal profile image
     */
    public function updateImage(Request $request) {
        $account = auth('sanctum')->user();
        if (class_basename($account) === 'Association') {
            $user = Association::find($account->id);
        } else {
            return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
        }
        $animal = Animal::find($request->animal_id);
        if (!$animal) {
            return $this->sendError('No se encuentra el animal seleccionado.', ['error' => 'Unauthorized'], 401);
        }

        if (!$request->image) {
            $animal['image'] = null;
            $animal->save();
            return $this->sendResponse(null, 'Imagen actualizada.');
        } else {
            $image_64 = $request->image; // base64 encoded data
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
            $replace = substr($image_64, 0, strpos($image_64, ',')+1);
            // find substring fro replace here eg: data:image/png;base64,
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);


            $image_name = 'animal/'.$animal->id.'-'.time().'.'.$extension;
            // return $image_name;
            Storage::disk('public')->put($image_name, base64_decode($image));

            $animal['image'] = env('APP_URL', 'http://localhost').'/storage/'.$image_name;
            $animal->save();
            return $this->sendResponse(null, 'Imagen de perfil actualizada.');
        }
    }

    /**
     * Store/update fostering
     */
    public function storeFostering(Request $request) {
        $animal = Animal::find($request->animal_id);
        $user = auth('sanctum')->user();
        if (class_basename($user) === 'Association' && $animal->association_id === $user->id) {
            $fostering = Fostering::where('animal_id', '=', $request->animal_id);
            if ($fostering->first()) {
                $fostering->update($request->data);
                $fostering = $fostering->first();
            } else {
                $fostering = new Fostering;
                $fostering->fill($request->data);
                $fostering['animal_id'] = $request->animal_id;
                $fostering->save();
            }

            return $this->sendResponse($fostering, 'Acogida actualizada');
        } else {
            return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Delete fostering
     */
    public function deleteFostering(Request $request) {
        $animal = Animal::find($request->animal_id);
        $user = auth('sanctum')->user();
        if (class_basename($user) === 'Association' && $animal->association_id === $user->id) {
            $fostering = Fostering::where('animal_id', '=', $request->animal_id);
            if ($fostering->first()) {
                $fostering->delete();
                return $this->sendResponse(null, 'Acogida eliminada');
            }
        }
        return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
    }
}
