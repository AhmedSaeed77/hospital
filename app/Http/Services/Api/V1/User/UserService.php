<?php

namespace App\Http\Services\Api\V1\User;

use App\Http\Requests\Api\V1\User\UserMainDataRequest;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\PlatformService;
use App\Http\Traits\Responser;
use App\Repository\Eloquent\Repository;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Exception;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\V1\User\UserProfileResource;
use Illuminate\Support\Facades\Hash;

abstract class UserService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly UserRepositoryInterface             $userRepository,
        private readonly FileManagerService                  $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function getDetails()
    {
        $id = auth('api')->id();
        return $this->getService->handle(UserProfileResource::class, $this->userRepository, 'getById', parameters:[$id],is_instance:true);
    }

    public function updateMainData(UserMainDataRequest $request)
    {
        try
        {
            $id = auth('api')->id();
            $user = $this->userRepository->getById($id);

            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $image = $this->fileManagerService->handle("image", "user/images", $user->getRawOriginal('image'));
                $data['image'] = $image;
            } else
            {
                unset($data['image']);
            }

            if ($request->has('password') && $request->password != null)
            {
                $data['password'] = $request->password;
            }
            else
            {
                unset($data['password']);
            }

            $this->userRepository->update($id, $data);
            return $this->responseSuccess(message: __('messages.updated successfully'));
        }
        catch (\Exception $e)
        {
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }


    public function changePassword($request)
    {
        try
        {
            $id = auth('api')->id();
            $user = $this->userRepository->getById($id);
            if (Hash::check($request->current_password, $user->password))
            {
                $this->userRepository->update($user->id, ['password' => Hash::make($request->newpassword)]);
                return $this->responseSuccess(message: __('messages.updated successfully'));
            }
            else
            {
                return $this->responseFail(message: __('messages.old_password_is_not_correct'));
            }

        }
        catch (\Exception $e)
        {
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
