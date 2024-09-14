<?php

namespace App\Http\Services\Dashboard\Experience;

use App\Repository\DoctorExperienceRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class ExperienceService
{
    public function __construct(
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly DoctorExperienceRepositoryInterface $doctorExperienceRepository,
        private readonly FileManagerService  $fileManagerService,
        )
    {
    }

    public function index($doctor_id)
    {
        $doctors_experiences = $this->doctorExperienceRepository->getAllDoctorExperiencesDashboard($doctor_id,10);
        return view('dashboard.site.experiences.index', compact('doctors_experiences','doctor_id'));
    }

    public function create($doctor_id)
    {
        return view('dashboard.site.experiences.create',compact('doctor_id'));
    }

    public function store($request,$doctor_id)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $data['doctor_id'] = $doctor_id;
            $doctor_experience = $this->doctorExperienceRepository->create($data);
            DB::commit();
            return redirect()->route('experiences.index',$doctor_id)->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
    public function edit($doctor_id,$id)
    {
        $doctor_experience = $this->doctorExperienceRepository->getById($id);
        return view('dashboard.site.experiences.edit', compact('doctor_experience','doctor_id','id'));
    }

    public function update($request, $doctor_id,$id)
    {
        try
        {
            $doctor_experience = $this->doctorExperienceRepository->getById($id);
            $data = $request->validated();
            $data['doctor_id'] = $doctor_id;
            $this->doctorExperienceRepository->update($id, $data);
            return redirect()->route('experiences.index',$doctor_id)->with(['success' => __('messages.updated_successfully')]);
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
            $this->doctorExperienceRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

}
