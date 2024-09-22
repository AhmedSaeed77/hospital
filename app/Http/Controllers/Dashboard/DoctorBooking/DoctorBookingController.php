<?php

namespace App\Http\Controllers\Dashboard\DoctorBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Doctor\DoctorRequest;
use App\Http\Services\Dashboard\Doctor\DoctorBookingService;
use Illuminate\Http\Request;

class DoctorBookingController extends Controller
{
    public function __construct(private readonly DoctorBookingService $doctorBooking)
    {
    }

    public function index()
    {
        return $this->doctorBooking->index();
    }

    public function show($id)
    {
        return $this->doctorBooking->show($id);
    }

    public function edit(string $id)
    {
        return $this->doctorBooking->edit($id);
    }

    public function update(DoctorRequest $request, string $id)
    {
        return $this->doctorBooking->update($request, $id);
    }

    public function getAllBookingForDoctor($id)
    {
        return $this->doctorBooking->getAllBookingForDoctor($id);
    }

}
