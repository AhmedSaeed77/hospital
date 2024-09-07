<?php

namespace App\Http\Controllers\Dashboard\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\CityRequest;
use App\Http\Services\Dashboard\City\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(private readonly CityService $city)
    {
    }

    public function index()
    {
        return $this->city->index();
    }

    public function show($id)
    {
        return $this->city->show($id);
    }

    public function create()
    {
        return $this->city->create();
    }

    public function store(CityRequest $request)
    {
        return $this->city->store($request);
    }

    public function edit(string $id)
    {
        return $this->city->edit($id);
    }

    public function update(CityRequest $request, string $id)
    {
        return $this->city->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->city->destroy($id);
    }

}
