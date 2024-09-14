<?php

namespace App\Http\Services\Dashboard\Booking;

use App\Repository\DoctorRepositoryInterface;
use App\Repository\BookRepositoryInterface;
use App\Repository\DoctorTimeRepositoryInterface;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function __construct(
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly BookRepositoryInterface $bookingRepository,
        private readonly DoctorTimeRepositoryInterface $doctorTimeRepository,
        private readonly FileManagerService  $fileManagerService,
        )
    {
    }

    public function index()
    {
        $bookings = $this->bookingRepository->getAllBookingsDashboard(10);
        return view('dashboard.site.bookings.index', compact('bookings'));
    }


    public function show($id)
    {
        $booking = $this->bookingRepository->getById($id);
        return view('dashboard.site.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $doctor = $this->doctorRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        $genders = $this->genderRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('dashboard.site.doctors.edit', compact('doctor','categories','genders','cities'));
    }

    public function update($request, $id)
    {
        try
        {
            $user=$this->doctorRepository->getById($id);
            $data = $request->validated();
            $this->doctorRepository->update($id, $data);
            return redirect()->route('doctors.index')->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->doctorRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

}
