<?php

namespace App\Http\Services\Api\V1\Doctor;

use App\Http\Services\Api\V1\Doctor\DoctorService;

class DoctorWebService extends DoctorService
{
    public static function platform(): string
    {
        return 'website';
    }
}
