@extends('dashboard.core.app')
@section('title', __('dashboard.Edit') . ' ' . __('dashboard.advertisements'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.Edit') @lang('dashboard.advertisements')</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('advertisements.update', $advertisement->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.Edit') @lang('dashboard.advertisements')</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Type Select -->
                                    <div class="col-6">
                                        <label for="advs_type">@lang('dashboard.Type')</label>
                                        <select name="type" id="advs_type" class="form-control" required>
                                            <option selected disabled>@lang('dashboard.Choose_type')</option>
                                            <option value="image" {{ $advertisement->type == 'image' ? 'selected' : '' }}>@lang('dashboard.image')</option>
                                            <option value="doctor" {{ $advertisement->type == 'doctor' ? 'selected' : '' }}>@lang('dashboard.doctor')</option>
                                        </select>
                                    </div>

                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Doctor Select (Initially shown if 'doctor' is selected) -->
                                    <div class="col-6" id="doctor_input" style="{{ $advertisement->type == 'doctor' ? '' : 'display: none;' }}">
                                        <div class="form-group">
                                            <label for="doctor_type">@lang('dashboard.doctor')</label>
                                            <select name="doctor_id" id="doctor_type" class="form-control">
                                                <option selected disabled>@lang('dashboard.Choose_doctor')</option>
                                                @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" {{ $advertisement->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->t('name') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('doctor_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Image Input (Initially shown if 'image' is selected) -->
                                    <div class="col-6" id="image_input" style="{{ $advertisement->type == 'image' ? '' : 'display: none;' }}">
                                        <div class="form-group">
                                            <label for="image">@lang('dashboard.Image')</label>
                                            <input name="image" type="file" class="form-control" id="image">
                                            @if($advertisement->image)
                                            <img src="{{ url($advertisement->image) }}" style="width: 100px;"/>
                                        @endif
                                        </div>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">@lang('dashboard.Edit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_addons')
    <script>
        $(document).ready(function () {
            // Toggle input visibility based on 'type' selection
            $('#advs_type').on('change', function () {
                var selectedType = $(this).val();

                if (selectedType === 'image') {
                    $('#image_input').show();
                    $('#doctor_input').hide();
                    $('#doctor_type').prop('required', false);
                } else if (selectedType === 'doctor') {
                    $('#doctor_input').show();
                    $('#image_input').hide();
                    $('#doctor_type').prop('required', true);
                } else {
                    $('#image_input').hide();
                    $('#doctor_input').hide();
                }
            });
        });
    </script>
@endsection
