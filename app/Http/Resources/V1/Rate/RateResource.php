<?php

namespace App\Http\Resources\V1\Rate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'rate' => $this->rate,
            'message' => $this->message,
            'doctor' => $this->doctor->t('name'),
        ];
    }
}
