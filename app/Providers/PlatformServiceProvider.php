<?php

namespace App\Providers;

use App\Http\Services\Api\V1\Auth\AuthMobileService;
use App\Http\Services\Api\V1\Auth\AuthService;
use App\Http\Services\Api\V1\Auth\AuthWebService;

use App\Http\Services\Api\V1\User\UserMobileService;
use App\Http\Services\Api\V1\User\UserService;
use App\Http\Services\Api\V1\User\UserWebService;
use App\Http\Services\Api\V1\Advertisement\AdvertisementMobileService;
use App\Http\Services\Api\V1\Advertisement\AdvertisementService;
use App\Http\Services\Api\V1\Advertisement\AdvertisementWebService;
use App\Http\Services\Api\V1\Doctor\DoctorMobileService;
use App\Http\Services\Api\V1\Doctor\DoctorService;
use App\Http\Services\Api\V1\Doctor\DoctorWebService;
use App\Http\Services\Api\V1\Dependant\DependantMobileService;
use App\Http\Services\Api\V1\Dependant\DependantService;
use App\Http\Services\Api\V1\Dependant\DependantWebService;
use App\Http\Services\Api\V1\Rate\RateMobileService;
use App\Http\Services\Api\V1\Rate\RateService;
use App\Http\Services\Api\V1\Rate\RateWebService;
use App\Http\Services\Api\V1\City\CityMobileService;
use App\Http\Services\Api\V1\City\CityService;
use App\Http\Services\Api\V1\City\CityWebService;
use App\Http\Services\Api\V1\Category\CategoryMobileService;
use App\Http\Services\Api\V1\Category\CategoryService;
use App\Http\Services\Api\V1\Category\CategoryWebService;
use App\Http\Services\Api\V1\ContactUs\ContactUsMobileService;
use App\Http\Services\Api\V1\ContactUs\ContactUsService;
use App\Http\Services\Api\V1\ContactUs\ContactUsWebService;

use App\Http\Services\Api\V1\Book\BookMobileService;
use App\Http\Services\Api\V1\Book\BookService;
use App\Http\Services\Api\V1\Book\BookWebService;

use Illuminate\Support\ServiceProvider;

class PlatformServiceProvider extends ServiceProvider
{
    private const VERSIONS = [1];
    private const PLATFORMS = ['website', 'mobile'];
    private const DEFAULT_VERSION = 1;
    private const DEFAULT_PLATFORM = 'website';
    private const SERVICES = [
        1 => [
            AuthService::class => [
                AuthWebService::class,
                AuthMobileService::class
            ],
            UserService::class => [
                UserWebService::class,
                UserMobileService::class
            ],
            AdvertisementService::class => [
                AdvertisementWebService::class,
                AdvertisementMobileService::class
            ],
            DoctorService::class => [
                DoctorWebService::class,
                DoctorMobileService::class
            ],
            DependantService::class => [
                DependantWebService::class,
                DependantMobileService::class
            ],
            RateService::class => [
                RateWebService::class,
                RateMobileService::class
            ],
            CityService::class => [
                CityWebService::class,
                CityMobileService::class
            ],
            CategoryService::class => [
                CategoryWebService::class,
                CategoryMobileService::class
            ],
            ContactUsService::class => [
                ContactUsWebService::class,
                ContactUsMobileService::class
            ],
            BookService::class => [
                BookWebService::class,
                BookMobileService::class
            ],
        ],
    ];
    private ?int $version;
    private ?string $platform;

    public function __construct($app)
    {
        parent::__construct($app);

        foreach (self::VERSIONS as $version) {
            foreach (self::PLATFORMS as $platform) {
                $pattern = app()->isProduction()
                    ? "v$version/$platform/*"
                    : "api/v$version/$platform/*";

                if (request()->is($pattern)) {
                    $this->version = $version;
                    $this->platform = $platform;
                    return;
                }
            }
        }

        $this->version = self::DEFAULT_VERSION;
        $this->platform = self::DEFAULT_PLATFORM;
    }

    private function getTargetService(array $services)
    {
        foreach ($services as $service) {
            if ($service::platform() == $this->platform) {
                return $service;
            }
        }

        return $services[0];
    }

    private function initiate(): void
    {
        $services = self::SERVICES[$this->version] ?? [];

        foreach ($services as $abstractService => $targetServices) {
            $this->app->singleton($abstractService, $this->getTargetService($targetServices));
        }
    }

    public function register(): void
    {
        $this->initiate();
    }

    public function boot(): void
    {
        //
    }
}
