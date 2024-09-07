<?php

namespace App\Repository;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getActiveUsers();
    public function getAllUsersDashboard($perPage);
    public function getLikedDoctors($id);
    public function getAllDependants($id);

    public function getAllDependantsDashboard($id,$perPage);

}
