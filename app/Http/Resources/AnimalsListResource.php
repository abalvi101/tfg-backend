<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AnimalsListResource extends JsonResource
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
        $favourite = null;
        if (class_basename($user) === 'User') {
            $fav = DB::table('animal_user')
                ->where('animal_id', '=', $this->id)
                ->where('user_id', '=', $user->id)
                ->first();
            if ($fav) {
                $favourite = true;
            } else {
                $favourite = false;
            }
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
            'image' => $this->image,
            'province' => $this->province,
            'city' => $this->city,
            'specie' => $this->specie,
            'breed' => $this->breed,
            'size' => $this->size,
            'fostering' => !is_null($this->fostering),
            'favourite' => $favourite,
        ];
    }
}
