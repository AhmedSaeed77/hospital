<?php

namespace App\Http\Controllers\Dashboard\CancelReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CancelReason\CancelReasonRequest;
use App\Http\Services\Dashboard\CancelReason\CancelReasonService;
use Illuminate\Http\Request;

class CancelReasonController extends Controller
{
    public function __construct(private readonly CancelReasonService $cancelReason)
    {
    }

    public function index()
    {
        return $this->cancelReason->index();
    }

    public function show($id)
    {
        return $this->cancelReason->show($id);
    }

    public function create()
    {
        return $this->cancelReason->create();
    }

    public function store(CancelReasonRequest $request)
    {
        return $this->cancelReason->store($request);
    }

    public function edit(string $id)
    {
        return $this->cancelReason->edit($id);
    }

    public function update(CancelReasonRequest $request, string $id)
    {
        return $this->cancelReason->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->cancelReason->destroy($id);
    }

}
