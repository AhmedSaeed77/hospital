<?php

namespace App\Http\Services\Api\V1\Doctor;


use App\Http\Services\Api\V1\Doctor\DoctorService;

class DoctorMobileService extends DoctorService
{
    public static function platform(): string
    {
        return 'mobile';
    }
}
