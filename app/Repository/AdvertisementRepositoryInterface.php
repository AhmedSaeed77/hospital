<?php

namespace App\Repository;

interface AdvertisementRepositoryInterface extends RepositoryInterface
{
    public function getAllAdvertisementsDashboard($perPage);
}
