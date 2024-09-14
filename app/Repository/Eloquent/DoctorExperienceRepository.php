<?php

namespace App\Repository\Eloquent;

use App\Models\DoctorExperience;
use App\Repository\DoctorExperienceRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DoctorExperienceRepository extends Repository implements DoctorExperienceRepositoryInterface
{
    public function __construct(DoctorExperience $model)
    {
        parent::__construct($model);
    }

    public function getAllDoctorExperiencesDashboard($doctor_id,$perPage)
    {
        return $this->model::query()->where('doctor_id',$doctor_id)->orderBy('created_at', 'desc') ->paginate($perPage);
    }
}
