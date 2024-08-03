<?php

namespace App\Repository\Eloquent;

use App\Models\ContactUs;
use App\Repository\ContactUsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactUsRepository extends Repository implements ContactUsRepositoryInterface
{
    public function __construct(ContactUs $model)
    {
        parent::__construct($model);
    }
}
