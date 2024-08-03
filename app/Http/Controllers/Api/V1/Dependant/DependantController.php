<?php

namespace App\Http\Controllers\Api\V1\Dependant;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\V1\Dependant\DependantRequest;
use App\Http\Services\Api\V1\Dependant\DependantService;

class DependantController extends Controller
{
    public function __construct(
        private readonly DependantService $dependant,
    )
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->dependant->index();
    }

    public function store(DependantRequest $request)
    {
        return $this->dependant->store($request);
    }

}
