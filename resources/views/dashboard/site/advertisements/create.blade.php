@extends('dashboard.core.app')
@section('title', __('dashboard.Create') . ' ' . __('dashboard.advertisements'))

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
                    <h1>@lang('dashboard.advertisements')</h1>
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
                        <form action="{{ route('advertisements.store') }}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.Create') @lang('dashboard.advertisements')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <!-- Type Select -->
                                    <div class="col-6">
                                        <label for="advs_type">@lang('dashboard.Type')</label>
                                        <select name="type" id="advs_type" class="form-control" required>
                                            <option selected disabled>@lang('dashboard.Choose_type')</option>
                                            <option value="image">@lang('dashboard.image')</option>
                                            <option value="doctor">@lang('dashboard.doctor')</option>
                                        </select>
                                    </div>

                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Doctor Select (Initially hidden) -->
                                    <div class="col-6" id="doctor_input" style="display: none;">
                                        <div class="form-group">
                                            <label for="doctor_type">@lang('dashboard.doctor')</label>
                                            <select name="doctor_id" id="doctor_type" class="form-control" required>
                                                <option selected disabled>@lang('dashboard.Choose_doctor')</option>
                                                @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->t('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('doctor_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Image Input (Initially hidden) -->
                                    <div class="col-6" id="image_input" style="display: none;">
                                        <div class="form-group">
                                            <label for="image">@lang('dashboard.Image')</label>
                                            <input name="image" type="file" class="form-control" id="image">
                                        </div>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">@lang('dashboard.Create')</button>
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
    <!-- <script src="{{url('/')}}/admin/plugins/summernote/summernote-bs4.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('.summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

<script>
    $(document).ready(function () {
        // Initially hide both inputs
        $('#image_input').hide();
        $('#doctor_input').hide();

        // Listen for changes on the 'type' select input
        $('#advs_type').on('change', function () {
            var selectedType = $(this).val();

            // If the selected type is 'image', show image input and hide doctor select
            if (selectedType === 'image') {
                $('#image_input').show();  // Show the image input
                $('#doctor_input').hide(); // Hide the doctor select input
                $('#doctor_type').prop('required', false); // Remove required attribute from doctor select
            }
            // If the selected type is 'doctor', show doctor select and hide image input
            else if (selectedType === 'doctor') {
                $('#doctor_input').show(); // Show the doctor select input
                $('#image_input').hide();  // Hide the image input
                $('#doctor_type').prop('required', true); // Add required attribute to doctor select
            } else {
                $('#image_input').hide();
                $('#doctor_input').hide();
            }
        });
    });
</script>

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
