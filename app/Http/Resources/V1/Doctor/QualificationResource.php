<?php

namespace App\Http\Resources\V1\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QualificationResource extends JsonResource
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
            'university' => $this->t('university'),
            'college' => $this->t('college'),
            'degree' => $this->t('degree'),
            'description' => $this->t('description'),
        ];
    }
}
