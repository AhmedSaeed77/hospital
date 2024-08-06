<?php

namespace App\Http\Resources\V1\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'status' => $this->status,
            'doctor' => $this->doctor->t('name'),
            'date' => $this->date,
            'time' => $this->time,
            'description' => $this->description,
        ];
    }
}
