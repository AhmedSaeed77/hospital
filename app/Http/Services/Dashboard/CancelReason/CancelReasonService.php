<?php

namespace App\Http\Services\Dashboard\CancelReason;
use App\Repository\CancelReasonRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Services\Mutual\FileManagerService;
use Illuminate\Support\Facades\DB;

class CancelReasonService
{
    public function __construct(
        private readonly CancelReasonRepositoryInterface $cancelReasonRepository,
        private readonly FileManagerService  $fileManagerService,
    )
    {
    }

    public function index()
    {
        $cancelreasons = $this->cancelReasonRepository->getAllCancelReasonsDashboard(10);
        return view('dashboard.site.cancelreasons.index', compact('cancelreasons'));
    }

    public function create()
    {
        return view('dashboard.site.cancelreasons.create');
    }

    public function store($request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->validated();
            $cancelReason = $this->cancelReasonRepository->create($data);
            DB::commit();
            return redirect()->route('cancel-reasons.index')->with(['success' => __('messages.created_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show($id)
    {
        $cancelReason = $this->cancelReasonRepository->getById($id);
        return view('dashboard.site.cancelreasons.show', compact('cancelReason'));
    }
    public function edit($id)
    {
        $cancelReason = $this->cancelReasonRepository->getById($id);
        return view('dashboard.site.cancelreasons.edit', compact('cancelReason'));
    }

    public function update($request, $id)
    {
        try
        {
            DB::beginTransaction();
            $cancelReason = $this->cancelReasonRepository->getById($id);
            $data = $request->validated();
            $this->cancelReasonRepository->update($cancelReason->id, $data);
            DB::commit();
            return redirect()->route('cancel-reasons.index')->with(['success' => __('messages.updated_successfully')]);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->cancelReasonRepository->delete($id);
            return redirect()->back()->with(['success' => __('messages.deleted_successfully')]);
        }
        catch (\Exception $e)
        {
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
