<?php

namespace App\Repository\Eloquent;

use App\Models\Rate;
use App\Repository\RateRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RateRepository extends Repository implements RateRepositoryInterface
{
    public function __construct(Rate $model)
    {
        parent::__construct($model);
    }

    public function getAllRates($id)
    {
        return $this->model::query()->where('user_id', $id)->orderBy('created_at','desc')->get();
    }
}
