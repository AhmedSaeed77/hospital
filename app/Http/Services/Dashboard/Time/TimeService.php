<?php

namespace App\Http\Services\Dashboard\Time;
use App\Repository\DoctorTimeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class TimeService
{
    public function __construct(
        private readonly DoctorTimeRepositoryInterface $timeRepository,
        private readonly FileManagerService  $fileManagerService,
    )
    {
    }

    public function index($doctor_id)
    {
        $times = $this->timeRepository->getAllTimeForDoctor($doctor_id,15);
        return view('dashboard.site.times.index', compact('times','doctor_id'));
    }
    public function edit($doctor_id,$id)
    {
        $time = $this->timeRepository->getById($id);
        return view('dashboard.site.times.edit', compact('time','doctor_id'));
    }

    public function update($request, $doctor_id,$id)
    {
        try
        {
            DB::beginTransaction();
            $time = $this->timeRepository->getById($id);
            $data = $request->validated();
            $this->timeRepository->update($id, $data);
            DB::commit();
            return redirect()->route('times.index',$doctor_id)->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

}
