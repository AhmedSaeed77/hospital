@extends('dashboard.core.app')
@section('title', __('dashboard.doctors'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--                    <h1>@lang('dashboard.Home')</h1>--}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@lang('dashboard.doctors')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">@lang('dashboard.Home')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.doctors')</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0">@lang('dashboard.doctors')</h3>
                                <div>
                                    <a href="{{ route('times.index', auth()->user()->id) }}" class="btn btn-dark">@lang('dashboard.times')</a>
                                    <a href="{{ route('experiences.index', auth()->user()->id) }}" class="btn btn-dark">@lang('dashboard.experiences')</a>
                                    <a href="{{ route('qualifications.index', auth()->user()->id) }}" class="btn btn-dark">@lang('dashboard.qualifications')</a>
                                    <a href="{{ route('doctors.edit', auth()->user()->id) }}" class="btn btn-dark">@lang('dashboard.Edit')</a>
                                    <a href="{{ route('doctors.bookings', auth()->user()->id) }}" class="btn btn-dark">@lang('dashboard.bookings')</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{ $doctor->name }}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            @isset($doctor->name_en)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.name'):</th>
                                                <td>{{$doctor->t('name') }}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->bio_en)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.bio'):</th>
                                                <td>{{$doctor->t('bio')}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->image)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Image'):</th>
                                                <td><img  src="{{$doctor->image?url( $doctor->image) : '' }}" width="100px" height="auto"/></td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->parent_id )
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.parent'):</th>
                                                <td>{{$doctor->parent->full_name}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->address_en)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.address'):</th>
                                                <td>{{$doctor->t('address')}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->lat)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.lat'):</th>
                                                <td>{{$doctor->lat}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->lng)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.lng'):</th>
                                                <td>{{$doctor->lng}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->price_per_hour)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.price_per_hour'):</th>
                                                <td>{{$doctor->price_per_hour}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->patient_number)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.patient_number'):</th>
                                                <td>{{$doctor->patient_number}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->experience_years)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.experience_years'):</th>
                                                <td>{{$doctor->experience_years}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->category_id)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.category'):</th>
                                                <td>{{$doctor->category->t('name')}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->city_id)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.city'):</th>
                                                <td>{{$doctor->city->t('name')}}</td>
                                            </tr>
                                            @endisset
                                            @isset($doctor->gender_id)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Gender'):</th>
                                                <td>{{$doctor->gender->t('name')}}</td>
                                            </tr>
                                            @endisset

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js_addons')

    <script>
        function previewImage() {
            var input = document.getElementById('image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

