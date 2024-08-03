<?php

namespace App\Models;
use App\Http\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,LanguageToggle;

    protected $guarded = [];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'category_id');
    }
}
