<?php

namespace App\Http\Controllers\Dashboard\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Experience\ExperienceRequest;
use App\Http\Services\Dashboard\Experience\ExperienceService;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct(private readonly ExperienceService $experience)
    {
    }

    public function index($doctor_id)
    {
        return $this->experience->index($doctor_id);
    }

    public function show($doctor_id,$id)
    {
        return $this->experience->show($doctor_id,$id);
    }

    public function create($doctor_id)
    {
        return $this->experience->create($doctor_id);
    }

    public function store(ExperienceRequest $request,$doctor_id)
    {
        return $this->experience->store($request,$doctor_id);
    }

    public function edit($doctor_id,string $id)
    {
        return $this->experience->edit($doctor_id,$id);
    }

    public function update(ExperienceRequest $request,$doctor_id, string $id)
    {
        return $this->experience->update($request,$doctor_id, $id);
    }

    public function destroy($doctor_id,string $id)
    {
        return $this->experience->destroy($doctor_id,$id);
    }
}
