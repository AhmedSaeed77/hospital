<?php

namespace App\Http\Services\Api\V1\ContactUs;

use App\Http\Requests\Api\V1\ContactUs\ContactUsRequest;
use App\Http\Resources\V1\ContactUs\ContactUsResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\ContactUsRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class ContactUsService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly ContactUsRepositoryInterface $contactUsRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function store(ContactUsRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $rate = $this->contactUsRepository->create($data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.created successfully'), data: new ContactUsResource($rate, false));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
