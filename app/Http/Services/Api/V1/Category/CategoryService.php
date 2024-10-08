<?php

namespace App\Http\Services\Api\V1\Category;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Http\Resources\V1\City\CityResource;
use App\Http\Services\PlatformService;
use App\Http\Services\Mutual\GetService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\GenderRepositoryInterface;
use App\Repository\CancelReasonRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

abstract class CategoryService extends PlatformService
{
    use Responser;

    public function __construct(
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly GenderRepositoryInterface $genderRepository,
        private readonly CancelReasonRepositoryInterface $cancelReasonRepository,
        private readonly FileManagerService          $fileManagerService,
        private readonly GetService                          $getService,
    )
    {
    }

    public function index()
    {
        return $this->getService->handle(CategoryResource::class, $this->categoryRepository);
    }

    public function indexGender()
    {
        return $this->getService->handle(CategoryResource::class, $this->genderRepository);
    }

    public function indexCancelReason()
    {
        return $this->getService->handle(CityResource::class, $this->cancelReasonRepository);
    }

}
