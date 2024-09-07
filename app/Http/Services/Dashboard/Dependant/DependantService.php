<?php

namespace App\Http\Services\Dashboard\Dependant;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DependantService
{
    public function __construct(private readonly UserRepositoryInterface $dependantRepository)
    {
    }

    public function index($id)
    {
        $dependants = $this->dependantRepository->getAllDependantsDashboard($id,10);
        return view('dashboard.site.dependants.index', compact('id','dependants'));
    }

    public function create()
    {
        return view('dashboard.site.dependants.create');
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $dependant = $this->dependantRepository->create($data);
            DB::commit();
            return redirect()->route('dependants.index', $dependant->id)->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
    public function show($id,$dependant)
    {
        $dependant = $this->dependantRepository->getById($dependant);
        return view('dashboard.site.dependants.show', compact('dependant'));
    }
    public function edit($id)
    {
        $dependant = $this->dependantRepository->getById($id);
        return view('dashboard.site.dependants.edit', compact('dependant'));
    }

    public function update($request, $id)
    {
        try
        {
            $dependant=$this->dependantRepository->getById($id);
            $data = $request->validated();
            if ($data['password'] == null)
            {
                unset($data['password']);
            }
            $this->dependantRepository->update($id, $data);
            return redirect()->route('dependants.update', $user->id)->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($id,$dependant)
    {
        try
        {
            $this->dependantRepository->delete($dependant);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

}
