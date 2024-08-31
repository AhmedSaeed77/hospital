<?php

namespace App\Repository;

interface DoctorRepositoryInterface extends RepositoryInterface
{

    public function getAllDoctors();
    public function getAllPopularDoctors();
    public function getLikedDoctors($id);
    public function getUnAvailableDatesTimes($id);
}
