<?php

namespace App\Http\Controllers\Api\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Book\BookRequest;
use App\Http\Requests\Api\V1\Book\BookUpateRequest;
use App\Http\Requests\Api\V1\Book\BookCancelRequest;
use App\Http\Services\Api\V1\Book\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private readonly BookService $book,
    )
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return $this->book->index($request);
    }

    public function show($id)
    {
        return $this->book->show($id);
    }

    public function store(BookRequest $request)
    {
        return $this->book->store($request);
    }

    public function update(BookUpateRequest $request,$id)
    {
        return $this->book->update($request,$id);
    }

    public function cancel(BookCancelRequest $request,$id)
    {
        return $this->book->cancel($request,$id);
    }

}
