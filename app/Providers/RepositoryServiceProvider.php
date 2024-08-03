<?php

namespace App\Providers;

use App\Repository\Eloquent\Repository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\OtpRepository;
use App\Repository\Eloquent\AdvertisementRepository;
use App\Repository\Eloquent\DoctorRepository;
use App\Repository\Eloquent\UserDoctorRepository;
use App\Repository\Eloquent\RateRepository;
use App\Repository\Eloquent\CityRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ContactUsRepository;

use App\Repository\ContactUsRepositoryInterface;
use App\Repository\CityRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\RateRepositoryInterface;
use App\Repository\UserDoctorRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\AdvertisementRepositoryInterface;
use App\Repository\OtpRepositoryInterface;
use App\Repository\RepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(OtpRepositoryInterface::class, OtpRepository::class);
        $this->app->singleton(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
        $this->app->singleton(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->singleton(UserDoctorRepositoryInterface::class, UserDoctorRepository::class);
        $this->app->singleton(RateRepositoryInterface::class, RateRepository::class);
        $this->app->singleton(CityRepositoryInterface::class, CityRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ContactUsRepositoryInterface::class, ContactUsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
