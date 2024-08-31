<?php

namespace App\Http\Resources\V1\Book;
use App\Http\Resources\V1\Doctor\DoctorResource;
use App\Http\Resources\V1\Dependant\DependantResource;
use Illuminate\Http\Request;
use DateTime;
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
        $date = new DateTime($this->date);
        $formattedDate = $date->format('l, d, M. Y');

        return [
            'id' => $this->id,
            'book_number' => $this->book_number,
            'status' => $this->status,
            'doctor' => new DoctorResource($this->doctor),
            'dependant' => new DependantResource($this->parent),
            'date' => $formattedDate,
            'time' => $this->time,
            'description' => $this->description,
            'is_rated' => $this->has_rate
        ];
    }
}
