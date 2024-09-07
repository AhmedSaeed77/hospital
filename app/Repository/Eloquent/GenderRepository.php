<?php

namespace App\Repository\Eloquent;

use App\Models\Gender;
use App\Repository\GenderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GenderRepository extends Repository implements GenderRepositoryInterface
{
    public function __construct(Gender $model)
    {
        parent::__construct($model);
    }

    public function getAllGendersDashboard($perPage)
    {
        return $this->model::orderBy('created_at', 'desc')->paginate($perPage);
    }
}
