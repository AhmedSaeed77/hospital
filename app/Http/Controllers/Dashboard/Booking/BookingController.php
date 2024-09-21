<?php

namespace App\Http\Controllers\Dashboard\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Booking\BookingRequest;
use App\Http\Requests\Dashboard\Booking\changeStatusBookingRequest;
use App\Http\Services\Dashboard\Booking\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(private readonly BookingService $booking)
    {
    }

    public function index()
    {
        return $this->booking->index();
    }

    public function show($id)
    {
        return $this->booking->show($id);
    }

    public function edit(string $id)
    {
        return $this->booking->edit($id);
    }

    public function update(BookingRequest $request, string $id)
    {
        return $this->booking->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->booking->destroy($id);
    }

    public function changeStatus(changeStatusBookingRequest $request,$id)
    {
        return $this->booking->changeStatus($request,$id);
    }
}
