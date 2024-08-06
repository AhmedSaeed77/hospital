<?php

namespace App\Http\Resources\V1\Doctor;
use App\Http\Resources\V1\Rate\RateUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorTimeResource extends JsonResource
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
            'day' => $this->t('day'),
            'day_index' => $this->day_index,
            'from' => $this->from,
            'to' => $this->to,
        ];
    }
}
