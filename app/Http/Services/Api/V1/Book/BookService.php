<?php

namespace App\Http\Services\Api\V1\Book;

use App\Http\Requests\Api\V1\Book\BookUpateRequest;
use App\Http\Requests\Api\V1\Book\BookRequest;
use App\Http\Requests\Api\V1\Book\BookCancelRequest;
use App\Http\Resources\V1\Book\BookResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\BookRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        return $this->getService->handle(BookResource::class, $this->bookRepository, 'getAllBooking', parameters: [$request->status]);
    }

    public function show($id)
    {
        return $this->getService->handle(BookResource::class, $this->bookRepository, 'getById', parameters: [$id],is_instance:true);
    }

    public function store(BookRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->except('dependant_id');
            $data['user_id'] = auth()->user()->id;
            if($request->dependant_id)
            {
                $data['parent_id'] = $request->dependant_id;
            }
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

    public function update(BookUpateRequest $request,$id)
    {
        DB::beginTransaction();
        try
        {
            $book = $this->bookRepository->getById($id);
            $data = $request->except('dependant_id');
            $data['parent_id'] = $request->dependant_id ?? null;
            $book = $this->bookRepository->update($book->id,$data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.updated successfully'));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

    public function cancel(BookCancelRequest $request,$id)
    {
        DB::beginTransaction();
        try
        {
            $book = $this->bookRepository->getById($id);
            $data = $request->validated();
            $book = $this->bookRepository->update($book->id,["status" => "CANCELED" , "cancel_reason_id" => $request->reason_id ]);
            DB::commit();
            return $this->responseSuccess(message: __('messages.canceled successfully'));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
