<?php

namespace App\Http\Services\Api\V1\Advertisement;

use App\Http\Resources\V1\Advertisement\AdvertisementResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\AdvertisementRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class AdvertisementService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly AdvertisementRepositoryInterface $advertisementRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                   $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(AdvertisementResource::class, $this->advertisementRepository);
    }

}
