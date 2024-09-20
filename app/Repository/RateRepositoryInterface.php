<?php

namespace App\Repository;

interface RateRepositoryInterface extends RepositoryInterface
{
    public function getAllRates($id);
    public function getAllDoctorsRates($id);
}
