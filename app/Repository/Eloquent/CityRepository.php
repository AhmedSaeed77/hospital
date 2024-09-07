<?php

namespace App\Repository\Eloquent;

use App\Models\City;
use App\Repository\CityRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CityRepository extends Repository implements CityRepositoryInterface
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function getAllCitiesDashboard($perPage)
    {
        return $this->model::orderBy('created_at', 'desc')->paginate($perPage);
    }
}
