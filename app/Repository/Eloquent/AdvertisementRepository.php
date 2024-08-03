<?php

namespace App\Repository\Eloquent;

use App\Models\Advertisement;
use App\Repository\AdvertisementRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AdvertisementRepository extends Repository implements AdvertisementRepositoryInterface
{
    public function __construct(Advertisement $model)
    {
        parent::__construct($model);
    }
}
