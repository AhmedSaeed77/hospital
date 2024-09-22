@extends('dashboard.core.app')
@section('title', __('dashboard.Edit') . ' ' . __('dashboard.doctors'))

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
                        <form action="{{ route('doctors.update', $doctor->id) }}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.Create') @lang('dashboard.doctors')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Name Ar')</label>
                                            <input name="name_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->name_ar }}" placeholder="@lang('dashboard.Name Ar')" >
                                        </div>
                                    </div>
                                    @error('name_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Name En')</label>
                                            <input name="name_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->name_en }}" placeholder="@lang('dashboard.Name En')" >
                                        </div>
                                    </div>
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Address Ar')</label>
                                            <input name="address_ar" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->address_ar }}" placeholder="@lang('dashboard.Address Ar')">
                                        </div>
                                    </div>
                                    @error('address_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Address En')</label>
                                            <input name="address_en" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->address_en }}" placeholder="@lang('dashboard.Address En')" >
                                        </div>
                                    </div>
                                    @error('address_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.lat')</label>
                                            <input name="lat" type="number" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->lat }}" placeholder="@lang('dashboard.lat')">
                                        </div>
                                    </div>
                                    @error('lat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.lng')</label>
                                            <input name="lng" type="number" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->lng }}" placeholder="@lang('dashboard.lng')" >
                                        </div>
                                    </div>
                                    @error('lng')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.price_per_hour')</label>
                                            <input name="price_per_hour" type="number" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->price_per_hour }}" placeholder="@lang('dashboard.price_per_hour')">
                                        </div>
                                    </div>
                                    @error('price_per_hour')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.patient_number')</label>
                                            <input name="patient_number" type="number" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->patient_number }}" placeholder="@lang('dashboard.patient_number')" >
                                        </div>
                                    </div>
                                    @error('patient_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.experience_years')</label>
                                            <input name="experience_years" type="number" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $doctor->experience_years }}" placeholder="@lang('dashboard.experience_years')">
                                        </div>
                                    </div>
                                    @error('experience_years')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.category')</label>
                                            <select name="category_id" id="doctor_type" class="form-control" >
                                                <option selected disabled>@lang('dashboard.Choose_category')</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $doctor->category_id == $category->id ? 'selected' : '' }}>{{ $category->t('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.city')</label>
                                            <select name="city_id"  class="form-control" >
                                                <option selected disabled>@lang('dashboard.Choose_city')</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $doctor->city_id == $city->id ? 'selected' : '' }}>{{ $city->t('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('city_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Gender')</label>
                                            <select name="gender_id"  class="form-control" >
                                                <option selected disabled>@lang('dashboard.Choose_gender')</option>
                                                @foreach($genders as $gender)
                                                    <option value="{{ $gender->id }}" {{ $doctor->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->t('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('gender_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Image')</label>
                                            <input name="image" type="file" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ old('image') }}" placeholder="@lang('dashboard.Name Ar')" >
                                            @if($doctor->image)
                                                <img src="{{ url($doctor->image) }}" style="width: 100px;"/>
                                            @endif
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.bio_ar')</label>
                                            <textarea name="bio_ar"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.bio_ar')">{{ $doctor->bio_ar }}</textarea>
                                        </div>
                                    </div>
                                    @error('bio_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.bio_en')</label>
                                            <textarea name="bio_en"  class="form-control" id="exampleInputName1" placeholder="@lang('dashboard.bio_en')">{{ $doctor->bio_en }}</textarea>
                                        </div>
                                    </div>
                                    @error('bio_en')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr>
                                <label for="exampleInputName1">@lang('dashboard.profile')</label>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.name')</label>
                                            <input name="name" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $manager->name }}" placeholder="@lang('dashboard.name')">
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Email')</label>
                                            <input name="email" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $manager->email }}" >
                                        </div>
                                    </div>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.phone')</label>
                                            <input name="phone" type="text" class="form-control"
                                                   id="exampleInputName1"
                                                   value="{{ $manager->phone }}" placeholder="@lang('dashboard.phone')">
                                        </div>
                                    </div>
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">@lang('dashboard.role')</label>
                                            <select name="role_id"  class="form-control" required>
                                                <option selected disabled>@lang('dashboard.Choose_role')</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" @if($manager->roles()->first()->id == $role->id) selected @endif>{{ $role->t('display_name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">@lang('dashboard.Password')</label>
                                            <input name="password" type="password" class="form-control"
                                                   id="exampleInputPassword1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputPassword2">@lang('dashboard.Confirm Password')</label>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                   id="exampleInputPassword2" placeholder="">
                                        </div>
                                    </div>
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
