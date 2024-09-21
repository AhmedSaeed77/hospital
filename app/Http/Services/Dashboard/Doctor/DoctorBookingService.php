<?php

namespace App\Http\Services\Dashboard\Doctor;

use App\Repository\DoctorRepositoryInterface;
use App\Repository\DoctorTimeRepositoryInterface;
use App\Repository\GenderRepositoryInterface;
use App\Repository\CityRepositoryInterface;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class DoctorBookingService
{
    public function __construct(
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly FileManagerService  $fileManagerService,
        )
    {
    }

    public function index()
    {
        $doctor = $this->doctorRepository->getDoctor(auth()->user()->id);
        // return $doctor;
        return view('dashboard.site.doctors.doctor_booking', compact('doctor'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $genders = $this->genderRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('dashboard.site.doctors.create',compact('categories','genders','cities'));
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "doctor/images");
            }
            $doctor = $this->doctorRepository->create($data);
            $this->storAt($doctor->id);
            DB::commit();
            return redirect()->route('doctors.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }


    public function show($id)
    {
        $doctor = $this->doctorRepository->getById($id);
        return view('dashboard.site.doctor.show', compact('doctor'));
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
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "doctor/images");
            }
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

    public function storAt($doctor_id)
    {
        $days_english = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];

        $days_arabic = [
            'الأثنين',
            'الثلاثاء',
            'الأربعاء',
            'الخميس',
            'الجمعة',
            'السبت',
            'الأحد',
        ];

        $day_index = [1, 2, 3, 4, 5, 6, 7];

        foreach ($days_english as $index => $day) {
            $this->doctorTimeRepository->create([
                'day_index' => $day_index[$index],              // English day name
                'day_en' => $day,              // English day name
                'day_ar' => $days_arabic[$index], // Corresponding Arabic day name
                'from' => '09:00:00',        // Default start time
                'to' => '17:00:00',        // Default end time
                'doctor_id' => $doctor_id,        // Default end time
            ]);
        }
    }

}
