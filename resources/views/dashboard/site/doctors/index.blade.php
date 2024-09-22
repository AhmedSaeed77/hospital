@extends('dashboard.core.app')
@php
    use \Illuminate\Support\Facades\Gate;
@endphp
@section('title', __('dashboard.doctors'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.doctors')</h1>
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
                            <h3 class="card-title">@lang('dashboard.doctors')</h3>
                            <div class="card-tools">
                                @permission('doctors-create')
                                <a href="{{ route('doctors.create') }}"
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
                                    <th>@lang('dashboard.Gender')</th>
                                    <th>@lang('dashboard.Image')</th>
                                    <th>@lang('dashboard.Operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->t('name') }}</td>
                                        <td>{{ $doctor->gender->t('name') }}</td>
                                        <td><img src="{{ !is_null($doctor->image) ? url($doctor->image) : '' }}" style="width: 100px;" /></td>
                                        <td>
                                            <div class="operations-btns" style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                                                <a href="{{ route('times.index', $doctor->id) }}" class="btn btn-dark">@lang('dashboard.times')</a>
                                                <a href="{{ route('experiences.index', $doctor->id) }}" class="btn btn-dark">@lang('dashboard.experiences')</a>
                                                <a href="{{ route('qualifications.index', $doctor->id) }}" class="btn btn-dark">@lang('dashboard.qualifications')</a>

                                                @permission('doctors-update')
                                                <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-dark">@lang('dashboard.Edit')</a>
                                                @endpermission

                                                @permission('doctors-delete')
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal{{ $loop->iteration }}">@lang('dashboard.delete')</button>
                                                @endpermission
                                            </div>

                                            <div id="delete-modal{{ $loop->iteration }}" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">@lang('dashboard.confirm_delete')</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>@lang('dashboard.sure_delete')</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-dark">@lang('dashboard.close')</button>
                                                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}
                                                                <button type="submit" class="btn btn-danger">@lang('dashboard.Delete')</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                            {{ $doctors->links() }}
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
