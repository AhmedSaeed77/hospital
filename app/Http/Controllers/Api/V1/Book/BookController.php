<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Book\BookRequest;
use App\Http\Services\Api\V1\Book\BookService;

class BookController extends Controller
{
    public function __construct(
        private readonly BookService $book,
    )
    {
        $this->middleware('auth:api');
    }

    public function store(BookRequest $request)
    {
        return $this->book->store($request);
    }

}
