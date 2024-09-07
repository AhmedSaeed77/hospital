<?php

namespace App\Http\Controllers\Dashboard\Gender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Gender\GenderRequest;
use App\Http\Services\Dashboard\Gender\GenderService;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function __construct(private readonly GenderService $gender)
    {
    }

    public function index()
    {
        return $this->gender->index();
    }

    public function show($id)
    {
        return $this->gender->show($id);
    }

    public function create()
    {
        return $this->gender->create();
    }

    public function store(GenderRequest $request)
    {
        return $this->gender->store($request);
    }

    public function edit(string $id)
    {
        return $this->gender->edit($id);
    }

    public function update(GenderRequest $request, string $id)
    {
        return $this->gender->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->gender->destroy($id);
    }

}
