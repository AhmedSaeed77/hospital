<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\UserMainDataRequest;
use App\Http\Requests\Api\V1\User\UserPasswordRequest;
use App\Http\Services\Api\V1\User\UserService;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $user,
    )
    {
        $this->middleware('auth:api');
    }

    public function getDetails()
    {
        return $this->user->getDetails();
    }

    public function updateMainData(UserMainDataRequest $request)
    {
        return $this->user->updateMainData($request);
    }

    public function updatePassword(UserPasswordRequest $request)
    {
        return $this->user->changePassword($request);
    }

}
