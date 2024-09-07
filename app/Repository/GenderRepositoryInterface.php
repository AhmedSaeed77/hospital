<?php

namespace App\Repository;

interface GenderRepositoryInterface extends RepositoryInterface
{
    public function getAllGendersDashboard($perPage);
}
