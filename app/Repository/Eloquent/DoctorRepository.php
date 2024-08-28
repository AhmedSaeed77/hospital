<?php

namespace App\Repository\Eloquent;

use App\Models\Doctor;
use App\Repository\DoctorRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DoctorRepository extends Repository implements DoctorRepositoryInterface
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);
    }

    public function getAllDoctors()
    {
        return $this->model::query()
                ->when(request()->has('category_id') && request('category_id') != null, function ($query) {
                    $query->where('category_id', request('category_id'));
                })
                ->when(request()->has('city_id') && request('city_id') != null, function ($query) {
                    $query->where('city_id', request('city_id'));
                })
                ->when(request()->has('search_text') && request('search_text') != null, function ($query) {
                    $query->where('name_en', request('search_text'))
                        ->orWhere('name_ar', request('search_text'));
                })
                ->get();
    }

    public function getAllPopularDoctors()
    {
        // return $this->model::query()->where('is_popular', true)->get();
        return $this->model::with('rates')
        ->withAvg('rates', 'rate')   // Calculate the average rate
        ->orderBy('rates_avg_rate', 'desc') // Order by the average rate in descending order
        ->limit(6)                    // Limit to top 6 doctors
        ->get();
    }

    public function getLikedDoctors($id)
    {
        return $this->doctors();
    }
}
