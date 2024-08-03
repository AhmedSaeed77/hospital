<?php

namespace App\Http\Controllers\Api\V1\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Doctor\LikeDoctorRequest;
use App\Http\Services\Api\V1\Doctor\DoctorService;

class DoctorController extends Controller
{
    public function __construct(
        private readonly DoctorService $doctor,
    )
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->doctor->index();
    }

    public function show($id)
    {
        return $this->doctor->show($id);
    }

    public function getPopular()
    {
        return $this->doctor->getPopular();
    }

    public function getLiked()
    {
        return $this->doctor->getLiked();
    }

    public function likeDoctor(LikeDoctorRequest $request)
    {
        return $this->doctor->likeDoctor($request);
    }

    public function unLikeDoctor(LikeDoctorRequest $request)
    {
        return $this->doctor->unLikeDoctor($request);
    }


}
