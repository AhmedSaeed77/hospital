<?php

namespace App\Http\Services\Api\V1\City;

class CityWebService extends CityService
{
    public static function platform(): string
    {
        return 'website';
    }

    public function whatIsMyPlatform() : string // will be invoked if the request came from website endpoints
    {
        return 'platform: website!';
    }
}
