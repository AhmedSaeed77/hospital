<?php

namespace App\Http\Services\Api\V1\Doctor;

use App\Http\Services\Mutual\GetService;
use App\Http\Services\PlatformService;
use App\Http\Traits\Responser;
use App\Repository\Eloquent\Repository;
use App\Http\Requests\Api\V1\Doctor\LikeDoctorRequest;
use App\Repository\UserRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\UserDoctorRepositoryInterface;
use Carbon\Carbon;
use Exception;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\V1\Doctor\DoctorResource;
use App\Http\Resources\V1\Doctor\OneDoctorResource;
use App\Http\Resources\V1\Doctor\DoctorLikedResource;
use App\Http\Resources\V1\Doctor\QualificationExperienceResource;
use App\Http\Resources\V1\Doctor\RateDoctorsResource;
use Illuminate\Support\Facades\Hash;

abstract class DoctorService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly UserRepositoryInterface             $userRepository,
        private readonly DoctorRepositoryInterface           $doctorRepository,
        private readonly UserDoctorRepositoryInterface       $userdoctorRepository,
        private readonly FileManagerService                  $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(DoctorResource::class, $this->doctorRepository, 'getAllDoctors');
    }

    public function show($id)
    {
        return $this->getService->handle(OneDoctorResource::class, $this->doctorRepository, 'getById',parameters:[$id],is_instance:true);
    }

    public function getQualifications($id)
    {
        return $this->getService->handle(QualificationExperienceResource::class, $this->doctorRepository, 'getById',parameters:[$id],is_instance:true);
    }

    public function getRates($id)
    {
        return $this->getService->handle(RateDoctorsResource::class, $this->doctorRepository, 'getById',parameters:[$id],is_instance:true);
    }

    public function getPopular()
    {
        return $this->getService->handle(DoctorResource::class, $this->doctorRepository, 'getAllPopularDoctors');
    }

    public function getLiked()
    {
        $id = auth('api')->id();
        return $this->getService->handle(DoctorLikedResource::class, $this->userRepository, 'getLikedDoctors',parameters:[$id]);
    }

    public function likeDoctor(LikeDoctorRequest $request)
    {
        try
        {
            $id = auth('api')->id();
            $data = $request->validated();
            $data['user_id'] = $id;
            $this->userdoctorRepository->create($data);
            return $this->responseSuccess(message: __('messages.created successfully'));
        }
        catch (\Exception $e)
        {
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

    public function unLikeDoctor(LikeDoctorRequest $request)
    {
        try
        {
            $id = auth('api')->id();
            $data = $request->validated();
            $data['user_id'] = $id;
            $userdoctor = $this->userdoctorRepository->getSpecificItem($request->doctor_id ,$id);
            $userdoctor->delete();
            return $this->responseSuccess(message: __('messages.deleted successfully'));
        }
        catch (\Exception $e)
        {
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }



}
