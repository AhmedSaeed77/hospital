<?php

namespace App\Models;
use App\Http\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory,LanguageToggle;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'gender_id');
    }
}
