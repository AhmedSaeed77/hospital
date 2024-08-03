<?php

namespace App\Repository;

interface UserDoctorRepositoryInterface extends RepositoryInterface
{
    public function getSpecificIteForUser($value);
    public function getSpecificItem($value1,$value2);
}
