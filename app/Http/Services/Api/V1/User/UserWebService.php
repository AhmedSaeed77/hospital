<?php

namespace App\Http\Services\Api\V1\User;

use App\Http\Services\Api\V1\User\UserService;

class UserWebService extends UserService
{
    public static function platform(): string
    {
        return 'website';
    }
    public function sin()
    {

    }
}
