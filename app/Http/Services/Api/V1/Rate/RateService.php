<?php

namespace App\Http\Services\Api\V1\Rate;

use App\Http\Requests\Api\V1\Rate\RateRequest;
use App\Http\Resources\V1\Rate\RateResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\RateRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class RateService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly RateRepositoryInterface $rateRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(RateResource::class, $this->rateRepository, 'getAllRates',parameters: [auth()->user()->id]);
    }

    public function store(RateRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $rate = $this->rateRepository->create($data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.created successfully'), data: new RateResource($rate, false));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
