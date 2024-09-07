<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository implements UserRepositoryInterface
{
    protected Model $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsersDashboard($perPage)
    {
        return $this->model::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function getActiveUsers()
    {
        return $this->model::query()->where('is_active', true);
    }

    public function getLikedDoctors($id)
    {
        return $this->model::find($id)->doctors()->orderBy('created_at', 'asc')->get();
    }

    public function getAllDependants($id)
    {
        return $this->model::where('parent_id',$id)->get();
    }

    public function getAllDependantsDashboard($id,$perPage)
    {
        return $this->model::where('parent_id',$id)->orderBy('created_at', 'asc')->paginate($perPage);
    }
}
