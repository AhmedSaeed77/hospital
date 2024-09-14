@extends('dashboard.core.app')
@section('title', __('titles.Home'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('dashboard.Home')</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.users')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['users']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.doctors')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['doctors']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.categories')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['categories']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.advertisements')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['advertisements']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.bookings')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['orders']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.genders')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['genders']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center">@lang('dashboard.cities')</span>
                                        <span
                                            class="info-box-number text-center mb-0">{{$data['cities']}}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
