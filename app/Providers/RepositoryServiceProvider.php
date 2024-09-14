<?php

namespace App\Providers;


use App\Repository\DoctorExperienceRepositoryInterface;
use App\Repository\DoctorQualificationRepositoryInterface;
use App\Repository\Eloquent\DoctorExperienceRepository;
use App\Repository\Eloquent\DoctorQualificationRepository;
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
use App\Repository\Eloquent\BookRepository;
use App\Repository\Eloquent\DoctorTimeRepository;
use App\Repository\Eloquent\StructureRepository;
use App\Repository\Eloquent\InfoRepository;
use App\Repository\Eloquent\GenderRepository;
use App\Repository\Eloquent\CancelReasonRepository;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\Eloquent\ManagerRepository;
use App\Repository\Eloquent\PermissionRepository;
use App\Repository\Eloquent\SettingsRepository;

use App\Repository\ManagerRepositoryInterface;
use App\Repository\SettingsRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\CancelReasonRepositoryInterface;
use App\Repository\GenderRepositoryInterface;
use App\Repository\InfoRepositoryInterface;
use App\Repository\StructureRepositoryInterface;
use App\Repository\ContactUsRepositoryInterface;
use App\Repository\BookRepositoryInterface;
use App\Repository\DoctorTimeRepositoryInterface;
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
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(OtpRepositoryInterface::class, OtpRepository::class);
        $this->app->singleton(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
        $this->app->singleton(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->singleton(UserDoctorRepositoryInterface::class, UserDoctorRepository::class);
        $this->app->singleton(RateRepositoryInterface::class, RateRepository::class);
        $this->app->singleton(CityRepositoryInterface::class, CityRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->singleton(BookRepositoryInterface::class, BookRepository::class);
        $this->app->singleton(DoctorTimeRepositoryInterface::class, DoctorTimeRepository::class);
        $this->app->singleton(StructureRepositoryInterface::class, StructureRepository::class);
        $this->app->singleton(InfoRepositoryInterface::class, InfoRepository::class);
        $this->app->singleton(GenderRepositoryInterface::class, GenderRepository::class);
        $this->app->singleton(CancelReasonRepositoryInterface::class, CancelReasonRepository::class);
        $this->app->singleton(ManagerRepositoryInterface::class, ManagerRepository::class);
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->singleton(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->singleton(DoctorExperienceRepositoryInterface::class, DoctorExperienceRepository::class);
        $this->app->singleton(DoctorQualificationRepositoryInterface::class, DoctorQualificationRepository::class);
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
