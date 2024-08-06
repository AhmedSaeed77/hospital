<?php

namespace App\Repository\Eloquent;

use App\Models\DoctorTime;
use App\Repository\DoctorTimeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DoctorTimeRepository extends Repository implements DoctorTimeRepositoryInterface
{
    public function __construct(DoctorTime $model)
    {
        parent::__construct($model);
    }
}
