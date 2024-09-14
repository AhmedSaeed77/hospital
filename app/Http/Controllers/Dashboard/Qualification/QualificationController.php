<?php

namespace App\Http\Controllers\Dashboard\Qualification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Qualification\QualificationRequest;
use App\Http\Services\Dashboard\Qualification\QualificationService;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function __construct(private readonly QualificationService $qualification)
    {
    }

    public function index($doctor_id)
    {
        return $this->qualification->index($doctor_id);
    }

    public function create($doctor_id)
    {
        return $this->qualification->create($doctor_id);
    }

    public function store(QualificationRequest $request,$doctor_id)
    {
        return $this->qualification->store($request,$doctor_id);
    }

    public function edit($doctor_id,string $id)
    {
        return $this->qualification->edit($doctor_id,$id);
    }

    public function update(QualificationRequest $request,$doctor_id, string $id)
    {
        return $this->qualification->update($request,$doctor_id, $id);
    }

    public function destroy($doctor_id,string $id)
    {
        return $this->qualification->destroy($doctor_id,$id);
    }
}
