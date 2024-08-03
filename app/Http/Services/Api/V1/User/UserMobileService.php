<?php

namespace App\Http\Services\Api\V1\User;


use App\Http\Services\Api\V1\User\UserService;

class UserMobileService extends UserService
{
    public static function platform(): string
    {
        return 'mobile';
    }
}
