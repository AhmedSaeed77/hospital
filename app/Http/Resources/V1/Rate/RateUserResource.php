<?php

namespace App\Http\Resources\V1\Rate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateUserResource extends JsonResource
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
            'image' => url($this->image),
        ];
    }
}
