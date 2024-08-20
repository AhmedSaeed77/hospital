<?php

namespace App\Repository;

interface OtpRepositoryInterface extends RepositoryInterface
{
    public function generateOtp();
    public function check($otp, $token,$user_id);
}
