<?php

namespace App\Http\Controllers\Dashboard\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Advertisement\AdvertisementRequest;
use App\Http\Services\Dashboard\Advertisement\AdvertisementService;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function __construct(private readonly AdvertisementService $advertisement)
    {
    }

    public function index()
    {
        return $this->advertisement->index();
    }

    public function show($id)
    {
        return $this->advertisement->show($id);
    }

    public function create()
    {
        return $this->advertisement->create();
    }

    public function store(AdvertisementRequest $request)
    {
        return $this->advertisement->store($request);
    }

    public function edit(string $id)
    {
        return $this->advertisement->edit($id);
    }

    public function update(AdvertisementRequest $request, string $id)
    {
        return $this->advertisement->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->advertisement->destroy($id);
    }

}
