<?php

namespace App\Http\Controllers\Api\V1\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\Advertisement\AdvertisementService;

class AdvertisementController extends Controller
{
    public function __construct(
        private readonly AdvertisementService $advertisement,
    )
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->advertisement->index();
    }

}
