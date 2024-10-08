<?php

namespace App\Http\Resources\V1\Rate;
use App\Http\Resources\V1\User\UserProfileResource;
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
            'user' => new UserProfileResource($this->user),
        ];
    }
}
