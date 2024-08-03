<?php

namespace App\Http\Controllers\Api\V1\ContactUs;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\V1\ContactUs\ContactUsRequest;
use App\Http\Services\Api\V1\ContactUs\ContactUsService;

class ContactUsController extends Controller
{
    public function __construct(
        private readonly ContactUsService $contatc_us,
    )
    {
        $this->middleware('auth:api');
    }

    public function store(ContactUsRequest $request)
    {
        return $this->contatc_us->store($request);
    }

}
