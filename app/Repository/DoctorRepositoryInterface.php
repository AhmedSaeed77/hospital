<?php

namespace App\Repository;

interface DoctorRepositoryInterface extends RepositoryInterface
{

    public function getAllDoctors();
    public function getAllPopularDoctors();
}
