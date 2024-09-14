@extends('dashboard.core.app')
@section('title', __('dashboard.Create') . ' ' . __('dashboard.experiences'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.experiences')</h1>
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
                        <form action="{{ route('experiences.update',[$doctor_id,$id]) }}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.Create') @lang('dashboard.experiences')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.hospital_ar')</label>
                                            <input name="hospital_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor_experience->hospital_ar }}" placeholder="@lang('dashboard.hospital_ar')" >
                                        </div>
                                    </div>
                                    @error('hospital_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.hospital_en')</label>
                                            <input name="hospital_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor_experience->hospital_en }}" placeholder="@lang('dashboard.hospital_en')" >
                                        </div>
                                    </div>
                                    @error('hospital_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.job_title_ar')</label>
                                            <input name="job_title_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor_experience->job_title_ar }}" placeholder="@lang('dashboard.job_title_ar')">
                                        </div>
                                    </div>
                                    @error('job_title_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.job_title_en')</label>
                                            <input name="job_title_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor_experience->job_title_en }}" placeholder="@lang('dashboard.job_title_en')" >
                                        </div>
                                    </div>
                                    @error('job_title_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description_ar')</label>
                                            <textarea name="description_ar"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.description_ar')">{{ $doctor_experience->description_ar  }}</textarea>
                                        </div>
                                    </div>
                                    @error('description_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description_en')</label>
                                            <textarea name="description_en"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.description_en')">{{ $doctor_experience->description_en  }}</textarea>
                                        </div>
                                    </div>
                                    @error('description_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">@lang('dashboard.Edit')</button>
                            </div>
                        </form>
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
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
            $('.select2').select2({
                language: {
                    searching: function () {
                    }
                },
            });
        });
    </script>
@endsection
