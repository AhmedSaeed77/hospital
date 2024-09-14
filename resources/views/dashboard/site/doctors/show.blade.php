@extends('dashboard.core.app')
@section('title', __('dashboard.user'))
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
                            <h1>@lang('dashboard.user')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">@lang('dashboard.Home')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.user')</li>
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
                                <h3 class="card-title">@lang('dashboard.user')</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{$user->full_name}}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            @isset($user->full_name)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Name'):</th>
                                                <td>{{$user->full_name}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->image)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.image'):</th>
                                                <td><img src="{{ !is_null($user->image) ? url($user->image) : '' }}" style="width: 100px;" /></td>
                                            </tr>
                                            @endisset
                                            @isset($user->email )
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Email'):</th>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->phone  )
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.phone'):</th>
                                                <td>{{$user->phone}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->birth_name)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.birth_name'):</th>
                                                <td>{{$user->birth_name}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->birth_date)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.birth_date'):</th>
                                                <td>{{$user->birth_date}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->address)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.address'):</th>
                                                <td>{{$user->address}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->lat)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.lat'):</th>
                                                <td>{{$user->lat}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->lng)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.lng'):</th>
                                                <td>{{$user->lng}}</td>
                                            </tr>
                                            @endisset
                                            @isset($user->relation)
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.relation'):</th>
                                                <td>{{$user->relation}}</td>
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

