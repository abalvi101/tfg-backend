<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
        // return parent::toArray($request);
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
            'province' => $this->province->name,
            'city' => $this->city->name,
            'specie' => $this->specie->name,
            'breed' => $this->breed->name,
            'size' => $this->size,
        ];
    }
}
