<?php

namespace App\Http\Services\Api\V1\Auth\Otp;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Resources\V1\User\UserResource;
use App\Http\Resources\V1\Otp\OtpResource;
use App\Http\Traits\Responser;
use App\Repository\OtpRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OtpService
{
    use Responser;

    public function __construct(
        private readonly OtpRepositoryInterface $otpRepository,
        private readonly UserRepositoryInterface $userRepository,
    )
    {

    }

    public function generate($request)
    {
        $user = $this->userRepository->first('phone',$request->phone);
        $user->otp()?->delete();
        $otp = $this->otpRepository->create([
            'user_id' => $user->id,
//            'otp' => rand(1234, 9999), TODO
            'otp' => 1111 ,
            'expire_at' => Carbon::now()->addMinutes(5),
            'token' => Str::random(30),
        ]);
        // $otp = $this->otpRepository->generateOtp();
        //TODO:  Send otp via SMS
        return $this->responseSuccess(data: OtpResource::make($otp));
    }

    public function verify($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $user = $this->userRepository->first('phone',$request->phone);
            if (!$this->otpRepository->check($data['otp'], $data['otp_token'],$user->id))
                return $this->responseFail(message: __('messages.Wrong OTP code or expired'));
            auth('api')->user()?->otp()?->delete();
            DB::commit();
            return $this->responseSuccess(data:new UserResource($user,true), message: __('messages.Your account has been verified successfully'));
        }
        catch (\Exception $e)
        {
            // return $e;
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }

}
