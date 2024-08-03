<?php

namespace App\Http\Services\Api\V1\Dependant;

use App\Http\Requests\Api\V1\Dependant\DependantRequest;
use App\Http\Requests\Api\V1\User\UserRequest;
use App\Http\Resources\V1\Dependant\DependantResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class DependantService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(DependantResource::class, $this->userRepository, 'getAllDependants',parameters: [auth()->user()->id]);
    }

    public function store(DependantRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "users/images");
            }
            $data['parent_id'] = auth()->user()->id;
            $user = $this->userRepository->create($data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.created successfully'), data: new UserResource($user, false));
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
