@extends('dashboard.core.app')
@php
    use \Illuminate\Support\Facades\Gate;
@endphp
@section('title', __('dashboard.cancel-reasons'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.cancel-reasons')</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('dashboard.cancel-reasons')</h3>
                            <div class="card-tools">
                                @permission('cancel-reasons-create')
                                <a href="{{ route('cancel-reasons.create') }}"
                                   class="btn  btn-dark">@lang('dashboard.Create')</a>
                                @endpermission
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('dashboard.Name')</th>
                                    <th>@lang('dashboard.Operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cancelreasons as $cancelReason)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cancelReason->t('name') }}</td>
                                      <td>
                                            <div class="operations-btns" style="">
                                                @permission('cancel-reasons-update')
                                                <a href="{{ route('cancel-reasons.edit', $cancelReason->id) }}"
                                                   class="btn  btn-dark">@lang('dashboard.Edit')</a>
                                                   @endpermission
{{--                                                <a href="{{ route('services.show', $service->id) }}"--}}
{{--                                                   class="btn  btn-dark">@lang('dashboard.Show')</a>--}}
                                                    @permission('cancel-reasons-delete')
                                                    <button class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#delete-modal{{ $loop->iteration }}">@lang('dashboard.delete')</button>
                                                    @endpermission
                                                    <div id="delete-modal{{ $loop->iteration }}"
                                                         class="modal fade modal2 " tabindex="-1" role="dialog"
                                                         aria-labelledby="myModalLabel" aria-hidden="true"
                                                         style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content float-left">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">@lang('dashboard.confirm_delete')</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>@lang('dashboard.sure_delete')</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal"
                                                                            class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                        @lang('dashboard.close')
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('cancel-reasons.destroy', $cancelReason->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        {{ method_field('delete') }}
                                                                        <button type="submit"
                                                                                class="btn btn-danger">@lang('dashboard.Delete')</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a target="_blank" href="{{ route('users.loginFromAdmin', $user->id) }}" class="btn  btn-success">@lang('dashboard.Login')</a> --}}

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    @include('dashboard.core.includes.no-entries', ['columns' => 5])
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $cancelreasons->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('js_addons')

@endsection
