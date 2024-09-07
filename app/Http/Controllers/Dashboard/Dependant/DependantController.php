<?php

namespace App\Http\Controllers\Dashboard\Dependant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\UserRequest;
use App\Http\Services\Dashboard\Dependant\DependantService;
use Illuminate\Http\Request;

class DependantController extends Controller
{
    public function __construct(private readonly DependantService $dependant)
    {
    }

    public function index($id)
    {
        return $this->dependant->index($id);
    }

    public function show($id,$dependant)
    {
        return $this->dependant->show($id,$dependant);
    }

    public function create()
    {
        return $this->dependant->create();
    }

    public function store(UserRequest $request)
    {
        return $this->dependant->store($request);
    }

    public function edit(string $id)
    {
        return $this->dependant->edit($id);
    }

    public function update(UserRequest $request, string $id)
    {
        return $this->dependant->update($request, $id);
    }

    public function destroy(string $id,$dependant)
    {
        return $this->dependant->destroy($id,$dependant);
    }
}
