<?php

namespace App\Repository;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getActiveUsers();
    public function getLikedDoctors($id);
    public function getAllDependants($id);
}
