<?php

namespace App\Http\Controllers\Api\V1\City;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\City\CityService;

class CityController extends Controller
{
    public function __construct(
        private readonly CityService $city,
    )
    {
    }

    public function index()
    {
        return $this->city->index();
    }

}
