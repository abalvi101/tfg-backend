<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = auth('sanctum')->user();
        $owner = class_basename($user) === 'Association' && $this->association->id === $user->id;
        $favourite = null;
        if (class_basename($user) === 'User') {
            if (
                DB::table('animal_user')
                    ->where('animal_id', '=', $this->id)
                    ->where('user_id', '=', $user->id)
                    ->first()
            ) {
                $favourite = true;
            }
            $favourite = false;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'birthday' => $this->birthday,
            'age' => Carbon::parse($this->birthday)->age,
            'entry_date' => $this->entry_date,
            'association' => $this->association,
            'weight' => $this->weight,
            'gender' => $this->gender,
            'neutered' => $this->neutered,
            'color' => $this->color,
            'description' => $this->description,
            'image' => $this->image,
            'province' => $this->province,
            'province_id' => $this->province->id,
            'city' => $this->city,
            'city_id' => $this->city->id,
            'specie' => $this->specie,
            'animal_specie_id' => $this->specie->id,
            'breed' => $this->breed,
            'breed_id' => $this->breed->id,
            'size' => $this->size,
            'size_id' => $this->size->id,
            'diseases' => $this->diseases,
            'fostering' => $this->fostering,
            'owner' => $owner,
            'favourite' => $favourite,
        ];
    }
}
