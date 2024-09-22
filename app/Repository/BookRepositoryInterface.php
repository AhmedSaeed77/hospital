<?php

namespace App\Repository;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getAllBooking($request);
    public function getAllBookingsDashboard($perPage);

    public function getAllBookingForDoctor($id);
}
