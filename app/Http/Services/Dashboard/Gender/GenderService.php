<?php

namespace App\Http\Services\Dashboard\Gender;
use App\Repository\GenderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class GenderService
{
    public function __construct(
        private readonly GenderRepositoryInterface $genderRepository,
        private readonly FileManagerService  $fileManagerService,
    )
    {
    }

    public function index()
    {
        $genders = $this->genderRepository->getAllGendersDashboard(10);
        return view('dashboard.site.genders.index', compact('genders'));
    }

    public function create()
    {
        return view('dashboard.site.genders.create');
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $gender = $this->genderRepository->create($data);
            DB::commit();
            return redirect()->route('genders.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show($id)
    {
        $gender = $this->genderRepository->getById($id);
        return view('dashboard.site.genders.show', compact('gender'));
    }
    public function edit($id)
    {
        $gender = $this->genderRepository->getById($id);
        return view('dashboard.site.genders.edit', compact('gender'));
    }

    public function update($request, $id)
    {
        try
        {
            DB::beginTransaction();
            $gender = $this->genderRepository->getById($id);
            $data = $request->validated();
            $this->genderRepository->update($gender->id, $data);
            DB::commit();
            return redirect()->route('genders.index')->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->genderRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
