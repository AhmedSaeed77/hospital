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
}
