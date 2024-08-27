<?php

namespace App\Repository;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getAllBooking($request);
}
