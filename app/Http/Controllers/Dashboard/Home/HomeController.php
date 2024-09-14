<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\UserRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\BookRepositoryInterface;
use App\Repository\CityRepositoryInterface;
use App\Repository\AdvertisementRepositoryInterface;
use App\Repository\GenderRepositoryInterface;

class HomeController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository ,
        private readonly DoctorRepositoryInterface $doctorRepository ,
        private readonly CategoryRepositoryInterface $categoryRepository ,
        private readonly BookRepositoryInterface $bokingRepository ,
        private readonly CityRepositoryInterface $cityRepository ,
        private readonly AdvertisementRepositoryInterface $advertisementsRepository ,
        private readonly GenderRepositoryInterface $genderRepository ,
    ){

    }

    public function index()
    {
        $data = [
            'users' => $this->userRepository->count(),
            'doctors' => $this->doctorRepository->count(),
            'categories' => $this->categoryRepository->count(),
            'orders' => $this->bokingRepository->count(),
            'advertisements' => $this->advertisementsRepository->count(),
            'genders' => $this->genderRepository->count(),
            'cities' => $this->cityRepository->count(),
        ];
        return view('dashboard.site.home.index',compact('data'));
    }
}
