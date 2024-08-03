<?php

namespace App\Http\Services\Api\V1\City;

use App\Http\Resources\V1\City\CityResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\CityRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class CityService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(CityResource::class, $this->cityRepository);
    }

}
