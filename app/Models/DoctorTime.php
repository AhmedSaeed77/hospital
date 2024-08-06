<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTime extends Model
{
    use HasFactory,LanguageToggle;

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
