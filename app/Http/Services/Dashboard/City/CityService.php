<?php

namespace App\Http\Services\Dashboard\City;
use App\Repository\CityRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class CityService
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
        private readonly FileManagerService  $fileManagerService,
    )
    {
    }

    public function index()
    {
        $cities = $this->cityRepository->getAllCitiesDashboard(10);
        return view('dashboard.site.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('dashboard.site.cities.create');
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "city/images");
            }
            $city = $this->cityRepository->create($data);
            DB::commit();
            return redirect()->route('cities.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show($id)
    {
        $city = $this->cityRepository->getById($id);
        return view('dashboard.site.cities.show', compact('city'));
    }
    public function edit($id)
    {
        $city = $this->cityRepository->getById($id);
        return view('dashboard.site.cities.edit', compact('city'));
    }

    public function update($request, $id)
    {
        try
        {
            DB::beginTransaction();
            $city = $this->cityRepository->getById($id);
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "city/images");
            }
            $this->cityRepository->update($id, $data);
            DB::commit();
            return redirect()->route('cities.index')->with(['success' => __('messages.updated_successfully')]);
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
            $this->cityRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
