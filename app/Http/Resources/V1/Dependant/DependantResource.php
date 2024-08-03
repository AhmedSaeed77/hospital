<?php

namespace App\Http\Resources\V1\Dependant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DependantResource extends JsonResource
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
            'relation' => $this->relation,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'address' => $this->address,
            'gender' => $this->gender,
            'image' => url($this->image) ?? null,
        ];
    }
}
