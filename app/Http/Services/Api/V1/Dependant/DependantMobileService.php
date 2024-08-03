<?php

namespace App\Http\Services\Api\V1\Dependant;

class DependantMobileService extends DependantService
{
    public static function platform(): string
    {
        return 'mobile';
    }

    public function whatIsMyPlatform() : string // will be invoked if the request came from mobile endpoints
    {
        return 'platform: mobile!';
    }
}
