<?php

namespace App\Repository\Eloquent;

use App\Models\Book;
use App\Repository\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BookRepository extends Repository implements BookRepositoryInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getAllBooking($status)
    {
        return $this->model::query()->where('status', $status)->latest()->get();
    }
}
