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

    public function getAllTimeForDoctor($doctor_id, $perPage)
    {
        return $this->model->where('doctor_id', $doctor_id)->paginate($perPage);
    }
}
