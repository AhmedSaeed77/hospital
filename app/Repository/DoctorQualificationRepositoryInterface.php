<?php

namespace App\Repository;

interface DoctorQualificationRepositoryInterface extends RepositoryInterface
{
    public function getAllDoctorQualificationsDashboard($doctor_id,$perPage);
}
