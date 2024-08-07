<?php

namespace App\Http\Controllers\Dashboard\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Info\InfoRequest;
use App\Http\Services\Dashboard\Info\InfosService;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function __construct(private InfosService $info)
    {
//        $this->middleware('permission:infos-update')->only('edit', 'update');
    }
    public function edit()
    {
        return $this->info->edit();
    }
    public function update(InfoRequest $request)
    {
        return $this->info->update($request);

    }
}
