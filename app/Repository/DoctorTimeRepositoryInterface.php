<?php

namespace App\Repository;

interface DoctorTimeRepositoryInterface extends RepositoryInterface
{
    public function getAllTimeForDoctor($doctor_id, $perPage);
}
