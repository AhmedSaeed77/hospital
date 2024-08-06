<?php

namespace App\Http\Services\Api\V1\Book;

use App\Http\Requests\Api\V1\Book\BookRequest;
use App\Http\Resources\V1\Book\BookResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\BookRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class BookService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly BookRepositoryInterface $bookRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function store(BookRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $book = $this->bookRepository->create($data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.created successfully'), data: new BookResource($book, false));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
