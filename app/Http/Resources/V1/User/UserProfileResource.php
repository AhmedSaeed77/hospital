<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                    'id' => $this->id,
                    'full_name' => $this->full_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'birth_name' => $this->birth_name,
                    'birth_date' => $this->birth_date,
                    'lat' => $this->lat,
                    'lng' => $this->lng,
                    'gender' => $this->gender,
                    'image' => url($this->image),
                ];
    }
}
