<?php

namespace App\Repository;

interface CityRepositoryInterface extends RepositoryInterface
{
    public function getAllCitiesDashboard($perPage);
}
