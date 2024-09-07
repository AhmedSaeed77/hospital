<?php

namespace App\Repository;

interface CancelReasonRepositoryInterface extends RepositoryInterface
{
    public function getAllCancelReasonsDashboard($perPage);
}
