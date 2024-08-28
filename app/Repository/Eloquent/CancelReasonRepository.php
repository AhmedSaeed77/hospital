<?php

namespace App\Repository\Eloquent;

use App\Models\CancelReason;
use App\Repository\CancelReasonRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CancelReasonRepository extends Repository implements CancelReasonRepositoryInterface
{
    public function __construct(CancelReason $model)
    {
        parent::__construct($model);
    }
}
