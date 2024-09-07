<?php

namespace App\Http\Services\Dashboard\Advertisement;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\AdvertisementRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class AdvertisementService
{
    public function __construct(
        private readonly AdvertisementRepositoryInterface $advertisementRepository,
        private readonly DoctorRepositoryInterface $doctorRepository,
        private readonly FileManagerService  $fileManagerService,
    )
    {
    }

    public function index()
    {
        $advertisements = $this->advertisementRepository->getAllAdvertisementsDashboard(10);
        return view('dashboard.site.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        $doctors = $this->doctorRepository->getAll();
        return view('dashboard.site.advertisements.create',compact('doctors'));
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "advertisement/images");
            }
            $advertisement = $this->advertisementRepository->create($data);
            DB::commit();
            return redirect()->route('advertisements.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show($id)
    {
        $advertisement = $this->advertisementRepository->getById($id);
        return view('dashboard.site.advertisements.show', compact('advertisement'));
    }
    public function edit($id)
    {
        $doctors = $this->doctorRepository->getAll();
        $advertisement = $this->advertisementRepository->getById($id);
        return view('dashboard.site.advertisements.edit', compact('doctors','advertisement'));
    }

    public function update($request, $id)
    {
        try
        {
            DB::beginTransaction();
            $advertisement = $this->advertisementRepository->getById($id);
            $data = $request->validated();
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->fileManagerService->handle("image", "advertisement/images");
            }
            $this->advertisementRepository->update($id, $data);
            DB::commit();
            return redirect()->route('advertisements.index')->with(['success' => __('messages.updated_successfully')]);
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
            $this->advertisementRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
