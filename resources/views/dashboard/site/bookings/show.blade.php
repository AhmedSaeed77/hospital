@extends('dashboard.core.app')
@section('title', __('dashboard.bookings'))
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
                            <h1>@lang('dashboard.bookings')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">@lang('dashboard.Home')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.bookings')</li>
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
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.bookings')</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{ $booking->status_value }}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            @isset($booking->user)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.user'):</th>
                                                <td>{{$booking->user->full_name}}</td>
                                            </tr>
                                            @endisset
                                            @isset($booking->doctor_id)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.doctor'):</th>
                                                <td>{{$booking->doctor->t('name')}}</td>
                                            </tr>
                                            @endisset
                                            @isset($booking->parent_id )
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.parent'):</th>
                                                <td>{{$booking->parent->full_name}}</td>
                                            </tr>
                                            @endisset
                                            @isset($booking->date  )
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.date'):</th>
                                                <td>{{$booking->date}}</td>
                                            </tr>
                                            @endisset
                                            @isset($booking->time)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.time'):</th>
                                                <td>{{$booking->time}}</td>
                                            </tr>
                                            @endisset
                                            @isset($booking->description)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.description'):</th>
                                                <td>{{$booking->description}}</td>
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

