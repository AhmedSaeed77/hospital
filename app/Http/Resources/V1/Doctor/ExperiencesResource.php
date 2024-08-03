<?php

namespace App\Http\Resources\V1\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperiencesResource extends JsonResource
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
            'hospital' => $this->t('hospital'),
            'job_title' => $this->t('job_title'),
            'description' => $this->t('description'),
        ];
    }
}
