<?php

namespace App\Http\Services\Dashboard\Qualification;

use App\Repository\DoctorQualificationRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class QualificationService
{
    public function __construct(
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly DoctorQualificationRepositoryInterface $doctorQualificationRepository,
        private readonly FileManagerService  $fileManagerService,
        )
    {
    }

    public function index($doctor_id)
    {
        $doctors_qualifications = $this->doctorQualificationRepository->getAllDoctorQualificationsDashboard($doctor_id,10);
        return view('dashboard.site.qualifications.index', compact('doctors_qualifications','doctor_id'));
    }

    public function create($doctor_id)
    {
        return view('dashboard.site.qualifications.create',compact('doctor_id'));
    }

    public function store($request,$doctor_id)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $data['doctor_id'] = $doctor_id;
            $doctor_experience = $this->doctorQualificationRepository->create($data);
            DB::commit();
            return redirect()->route('qualifications.index',$doctor_id)->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
    public function edit($doctor_id,$id)
    {
        $doctors_qualification = $this->doctorQualificationRepository->getById($id);
        return view('dashboard.site.qualifications.edit', compact('doctors_qualification','doctor_id','id'));
    }

    public function update($request, $doctor_id,$id)
    {
        try
        {
            $doctors_qualification = $this->doctorQualificationRepository->getById($id);
            $data = $request->validated();
            $data['doctor_id'] = $doctor_id;
            $this->doctorQualificationRepository->update($doctors_qualification->id, $data);
            return redirect()->route('qualifications.index',$doctor_id)->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($doctor_id,$id)
    {
        try
        {
            $this->doctorQualificationRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

}
