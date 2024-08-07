<?php

namespace App\Http\Controllers\Api\V1\Info;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\Info\InfoService;

class InfoSiteController extends Controller
{
    public function __construct(private InfoService $service)
    {

    }

    public function __invoke()
    {
        return $this->service->__invoke();
    }
}
