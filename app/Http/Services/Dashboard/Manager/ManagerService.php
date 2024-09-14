<?php

namespace App\Http\Services\Dashboard\Manager;

use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\FileManager;
use App\Repository\ManagerRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\DoctorRepositoryInterface;
use Illuminate\Support\Facades\DB;
use function App\delete_model;
use function App\store_model;
use function App\update_model;

class ManagerService
{
    use FileManager;

    public function __construct(
        private ManagerRepositoryInterface $repository,
        private RoleRepositoryInterface    $roleRepository,
        private DoctorRepositoryInterface    $doctorRepository,
        private FileManagerService         $filemanagers,)
    {

    }

    public function index()
    {
        $role = $this->roleRepository->getById(1, relations: ['managers']);
        return view('dashboard.site.managers.index', compact('role'));
    }

    public function create()
    {
        $role = $this->roleRepository->getById(request('id'));
        $doctors = $this->doctorRepository->getAll();
        return view('dashboard.site.managers.create', compact('role','doctors'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try
        {
            $data = $request->except('id', 'image', 'password_confirmation','doctor_id');

            if ($request->image !== null)
                $data['image'] = $this->filemanagers->handle('image', 'managers/images');
            $manger = store_model($this->repository, $data, true);
            $manger->addRole($request->id);
            $doctor = $this->doctorRepository->getById($request->doctor_id);
            $this->doctorRepository->update($doctor->id,['manager_id' => $manger->id]);
            DB::commit();
            return redirect()->route('roles.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function edit($id)
    {
        $manager = $this->repository->getById($id);
        $role = $manager->roles->first();
        $doctors = $this->doctorRepository->getAll();
        return view('dashboard.site.managers.edit', compact('role', 'manager', 'doctors'));
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try
        {
            $manager = $this->repository->getById($id);
            $data = $request->except('id', 'image', 'password_confirmation','doctor_id');
            if ($request->image !== null)
                $data['image'] = $this->filemanagers->handle('image', 'managers/images', $manager->image);
            if (!isset($data['password']))
                unset($data['password']);
            // update_model($this->repository, $id, $data);
            $this->repository->update($manager->id,$data);
            $doctors = $this->doctorRepository->getAll();
            foreach ($doctors as $doctor)
            {
                if($doctor->manager_id == $manager->id)
                {
                    $doctor->update(['manager_id' => null]);
                }
            }
            $doctor = $this->doctorRepository->getById($request->doctor_id);
            $this->doctorRepository->update($doctor->id,['manager_id' => $manager->id]);
            DB::commit();
            return redirect()->route('roles.index')->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try
        {
            $manger = $this->repository->getById($id);
            if ($manger->image)
                $this->deleteFile($manger->image);
            delete_model($this->repository, $id);
            DB::commit();
            return redirect()->route('roles.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
