<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Doctor\DoctorRequest;
use App\Http\Services\Dashboard\Doctor\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(private readonly DoctorService $doctor)
    {
    }

    public function index()
    {
        return $this->doctor->index();
    }

    public function show($id)
    {
        return $this->doctor->show($id);
    }

    public function create()
    {
        return $this->doctor->create();
    }

    public function store(DoctorRequest $request)
    {
        return $this->doctor->store($request);
    }

    public function edit(string $id)
    {
        return $this->doctor->edit($id);
    }

    public function update(DoctorRequest $request, string $id)
    {
        return $this->doctor->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->doctor->destroy($id);
    }
}
