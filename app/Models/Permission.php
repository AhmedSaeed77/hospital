<?php

namespace App\Models;
use App\Http\Traits\LanguageToggle;
use Laratrust\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    use LanguageToggle;

    public $guarded = [];
}
