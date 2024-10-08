<?php

namespace App\Http\Services\Api\V1\Auth;

use App\Http\Requests\Api\V1\Auth\SignInRequest;
use App\Http\Requests\Api\V1\Auth\SignUpRequest;
use App\Http\Resources\V1\User\UserResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class AuthService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly FileManagerService          $fileManagerService
    )
    {
    }

    public function signUp(SignUpRequest $request) {
        DB::beginTransaction();
        try
        {
            $user = $this->userRepository->first('email',$request->email);
            if($user)
            {
                return $this->responseFail(data: __('messages.email_is_existing'));
            }
            $user = $this->userRepository->first('phone',$request->phone);
            if($user)
            {
                return $this->responseFail(data: __('messages.phone_is_existing'));
            }
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "users/images");
            }
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

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = auth('api')->attempt($credentials);
        if ($token)
        {
            return $this->responseSuccess(message: __('messages.Successfully authenticated'), data: new UserResource(auth('api')->user(), true));
        }

        return $this->responseFail(status: 401, message: __('messages.wrong credentials'));
    }

    public function signOut()
    {
        auth('api')->logout();
        return $this->responseSuccess(message: __('messages.Successfully loggedOut'));
    }

}
