<?php

namespace App\Http\Services\Dashboard\Doctor;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\DoctorTimeRepositoryInterface;
use App\Repository\GenderRepositoryInterface;
use App\Repository\CityRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\ManagerRepositoryInterface;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorService
{
    public function __construct(
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly DoctorTimeRepositoryInterface $doctorTimeRepository,
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly GenderRepositoryInterface $genderRepository,
        private readonly CityRepositoryInterface $cityRepository,
        private readonly RoleRepositoryInterface $roleRepository,
        private readonly ManagerRepositoryInterface $managerRepositery,
        private readonly FileManagerService  $fileManagerService,
        )
    {
    }

    public function index()
    {
        $doctors = $this->doctorRepository->getAllDoctorsDashboard(10);
        return view('dashboard.site.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $genders = $this->genderRepository->getAll();
        $cities = $this->cityRepository->getAll();
        $roles = $this->roleRepository->getAll();
        return view('dashboard.site.doctors.create',compact('categories','genders','cities','roles'));
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->except('name','email','password','password_confirmation','phone','role_id');
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "doctor/images");
            }
            $doctor = $this->doctorRepository->create($data);
            $this->storAt($doctor->id);
            $role = $this->roleRepository->getById($request->role_id);
            $manager = $this->managerRepositery->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $manager->addRole($role->id);
            $this->doctorRepository->update($doctor->id,['manager_id' => $manager->id]);
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
        $roles = $this->roleRepository->getAll();
        $manager = $this->managerRepositery->getById($doctor->manager_id);
        return view('dashboard.site.doctors.edit', compact('doctor','categories','genders','cities','roles','manager'));
    }

    public function update($request, $id)
    {
        try
        {
            $docotor = $this->doctorRepository->getById($id);
            $data = $request->except('name','email','password','password_confirmation','phone','role_id');
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "doctor/images");
            }
            $this->doctorRepository->update($id, $data);
            $role = $this->roleRepository->getById($request->role_id);
            $manager = $this->managerRepositery->getById($docotor->manager_id);
            $this->managerRepositery->update($manager->id,[
                                                            'name' => $request->name,
                                                            'email' => $request->email,
                                                            'phone' => $request->phone,
                                                            'password' => Hash::make($request->password),
                                                        ]);
            $manager->removeRole($role->name);
            $manager->addRole($role->id);
            $this->doctorRepository->update($docotor->id,['manager_id' => $manager->id]);
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
