<?php

namespace App\Http\Controllers\Dashboard\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Time\TimeRequest;
use App\Http\Services\Dashboard\Time\TimeService;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function __construct(private readonly TimeService $time)
    {
    }

    public function index($doctor_id)
    {
        return $this->time->index($doctor_id);
    }

    public function show($doctor_id,$id)
    {
        return $this->time->show($doctor_id,$id);
    }

    public function edit($doctor_id,string $id)
    {
        return $this->time->edit($doctor_id,$id);
    }

    public function update(TimeRequest $request,$doctor_id, string $id)
    {
        return $this->time->update($request,$doctor_id, $id);
    }


}
