@extends('dashboard.core.app')
@section('title', __('dashboard.Edit') . ' ' . __('dashboard.qualifications'))

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
                    <h1>@lang('dashboard.qualifications')</h1>
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
                        <form action="{{ route('qualifications.update',[$doctor_id,$id]) }}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.Edit') @lang('dashboard.qualifications')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.university_ar')</label>
                                            <input name="university_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->university_ar }}" placeholder="@lang('dashboard.university_ar')" >
                                        </div>
                                    </div>
                                    @error('university_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.university_en')</label>
                                            <input name="university_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->university_en }}" placeholder="@lang('dashboard.university_en')" >
                                        </div>
                                    </div>
                                    @error('university_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.college_ar')</label>
                                            <input name="college_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->college_ar }}" placeholder="@lang('dashboard.college_ar')">
                                        </div>
                                    </div>
                                    @error('college_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.college_en')</label>
                                            <input name="college_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->college_en }}" placeholder="@lang('dashboard.college_en')" >
                                        </div>
                                    </div>
                                    @error('college_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.degree_ar')</label>
                                            <input name="degree_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->degree_ar }}" placeholder="@lang('dashboard.degree_ar')">
                                        </div>
                                    </div>
                                    @error('degree_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.degree_en')</label>
                                            <input name="degree_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctors_qualification->degree_en }}" placeholder="@lang('dashboard.degree_en')" >
                                        </div>
                                    </div>
                                    @error('degree_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description_ar')</label>
                                            <textarea name="description_ar"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.description_ar')">{{ $doctors_qualification->description_ar }}</textarea>
                                        </div>
                                    </div>
                                    @error('description_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description_en')</label>
                                            <textarea name="description_en"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.description_en')">{{ $doctors_qualification->description_en }}</textarea>
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
