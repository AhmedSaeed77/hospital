<?php

namespace App\Repository\Eloquent;

use App\Models\UserDoctor;
use App\Repository\UserDoctorRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserDoctorRepository extends Repository implements UserDoctorRepositoryInterface
{
    protected Model $model;

    public function __construct(UserDoctor $model)
    {
        parent::__construct($model);
    }

    public function getSpecificIteForUser($value)
    {
        return $this->model->where('user_id',$value)->get();
    }

    public function getSpecificItem($value1,$value2)
    {
        return $this->model->where('doctor_id',$value1)->where('user_id',$value2)->first();
    }
}
