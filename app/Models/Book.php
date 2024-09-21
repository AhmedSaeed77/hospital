<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookNumber(): Attribute
    {
        return Attribute::make(
            get: fn() => '#' . 9999 + $this->id,
        );
    }

    public function hasRate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->rate()->exists()
        );
    }

    public function statusValue() : Attribute
    {
        return Attribute::get(function ()
        {
            if($this->status == 'upcoming')
                return __('general.upcoming');
            elseif($this->status == 'completed')
                return __('general.completed');
            else
                return __('general.canceled');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function rate()
    {
        return $this->hasOne(Rate::class,'book_id');
    }
}
