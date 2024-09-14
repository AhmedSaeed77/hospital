<?php

namespace App\Repository;

interface DoctorExperienceRepositoryInterface extends RepositoryInterface
{
    public function getAllDoctorExperiencesDashboard($doctor_id,$perPage);
}
