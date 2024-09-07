<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAllCategoriesDashboard($perPage)
    {
        return $this->model::orderBy('created_at', 'desc')->paginate($perPage);
    }
}
