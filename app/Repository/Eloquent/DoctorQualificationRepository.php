<?php

namespace App\Repository\Eloquent;

use App\Models\DoctorQualification;
use App\Repository\DoctorQualificationRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DoctorQualificationRepository extends Repository implements DoctorQualificationRepositoryInterface
{
    public function __construct(DoctorQualification $model)
    {
        parent::__construct($model);
    }

    public function getAllDoctorQualificationsDashboard($doctor_id,$perPage)
    {
        return $this->model::query()->where('doctor_id',$doctor_id)->orderBy('created_at', 'desc') ->paginate($perPage);
    }
}
