<?php

namespace App\Models;
use App\Http\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Auth;

class Doctor extends Model
{
    use HasFactory,LanguageToggle;

    protected $guarded = [];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? url($this->image) : null,
        );
    }

    protected function isLiked(): Attribute
    {
        return new Attribute(
            get: function () {
                if (Auth::check())
                {
                    $user = Auth::user();
                    return $user->doctors()->where('doctor_id', $this->id)->exists();
                }
                return null; // Return null if the user is not logged in
            }
        );
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    
    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function experiences()
    {
        return $this->hasMany(DoctorExperience::class, 'doctor_id');
    }

    public function qualifications()
    {
        return $this->hasMany(DoctorQualification::class, 'doctor_id');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'doctor_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_doctors');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'doctor_id');
    }

    public function times()
    {
        return $this->hasMany(DoctorTime::class, 'doctor_id');
    }

    public function bookings()
    {
        return $this->hasMany(Book::class, 'doctor_id');
    }
}
