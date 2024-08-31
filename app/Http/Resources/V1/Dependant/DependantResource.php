<?php

namespace App\Http\Resources\V1\Dependant;
use App\Http\Resources\V1\Gender\GenderResource;
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
                    'address' => $this->address,
                    'lat' => $this->lat,
                    'lng' => $this->lng,
                    'relation' => $this->relation,
                    'gender' => new GenderResource($this->gender),
                    'image' => $this->image_url,
        ];
    }
}
