<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;

use App\Http\Services\Api\V1\Category\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $category,
    )
    {
    }

    public function index()
    {
        return $this->category->index();
    }

    public function indexGender()
    {
        return $this->category->indexGender();
    }

    public function indexCancelReason()
    {
        return $this->category->indexCancelReason();
    }

}
