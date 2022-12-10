<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return class_basename($this->resource) === 'Association';

        $role = class_basename($this->resource) === 'User' ? 'user' : 'association';

        if ($role === 'user') {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'birthday' => Carbon::create($this->birthday)->toDateString(),
                'age' => Carbon::parse($this->birthday)->age,
                'province_id' => $this->province?->id,
                'city_id' => $this->city?->id,
                'gender' => $this->gender,
                'profile_image' => $this->profile_image,
                'favourites' => AnimalsListResource::collection($this->favourites),
            ];
        } else if ($role === 'association') {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'province' => $this->province->name,
                'city' => $this->city->name,
                'about_us' => $this->about_us,
                'profile_image' => $this->profile_image,
                'animals' => AnimalsListResource::collection($this->animals),
            ];
        } else {
            return [];
        }
    }
}
