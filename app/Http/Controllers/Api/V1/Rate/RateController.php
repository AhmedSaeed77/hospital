<?php

namespace App\Http\Controllers\Api\V1\Rate;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\V1\Rate\RateRequest;
use App\Http\Services\Api\V1\Rate\RateService;

class RateController extends Controller
{
    public function __construct(
        private readonly RateService $rate,
    )
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->rate->index();
    }

    public function store(RateRequest $request)
    {
        return $this->rate->store($request);
    }

}
