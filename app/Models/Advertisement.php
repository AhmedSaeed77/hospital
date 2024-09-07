<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? url($this->image) : null,
        );
    }

    public function typeValue() : Attribute
    {
        return Attribute::get(function () {
            if($this->type == 'image')
                return __('dashboard.image');
            else
                return __('dashboard.doctor');
        });
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
