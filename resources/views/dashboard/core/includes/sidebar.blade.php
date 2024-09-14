<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        {{--        <img src="{{asset("logo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">@lang('dashboard.Elryad')</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image? asset(auth()->user()->image) :asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @permission('dashboard-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['/'])? 'menu-open': '' }}">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.Home')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('categories-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['categories.index', 'categories.create', 'categories.edit', 'categories.show'])? 'menu-open': '' }}">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.categories')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('cities-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['cities.index', 'cities.create', 'cities.edit', 'cities.show'])? 'menu-open': '' }}">
                    <a href="{{ route('cities.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.cities')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('users-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['users.index', 'users.create', 'users.edit', 'users.show'])? 'menu-open': '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.users')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('doctors-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['doctors.index', 'doctors.create', 'doctors.edit', 'doctors.show'])? 'menu-open': '' }}">
                    <a href="{{ route('doctors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.doctors')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('bookings-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['bookings.index', 'bookings.edit', 'bookings.show'])? 'menu-open': '' }}">
                    <a href="{{ route('bookings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.bookings')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('advertisements-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['advertisements.index', 'advertisements.create', 'advertisements.edit', 'advertisements.show'])? 'menu-open': '' }}">
                    <a href="{{ route('advertisements.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.advertisements')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('cancel-reasons-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['cancel-reasons.index', 'cancel-reasons.create', 'cancel-reasons.edit', 'cancel-reasons.show'])? 'menu-open': '' }}">
                    <a href="{{ route('cancel-reasons.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.cancel-reasons')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('genders-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['genders.index', 'genders.create', 'genders.edit', 'genders.show'])? 'menu-open': '' }}">
                    <a href="{{ route('genders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.genders')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('personalinfo-read')
                <li
                    class="nav-item  {{ in_array(request()->route()->getName(),['settings.edit'])? 'menu-open': '' }} {{ Route::currentRouteName()=='settings.edit'?'activeNav':'' }}">
                    <a href="{{ route('settings.edit', auth()->user()->id) }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            @lang('dashboard.Settings')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('info-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['infos.edit'])? 'menu-open': '' }} {{ Route::currentRouteName()=='infos.edit'?'activeNav':'' }}">
                    <a href="{{ route('infos.edit',auth('web')->user()->id) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.infos')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('roles-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['roles.index','roles.create','roles.edit','roles.mangers','managers.create','managers.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.roles_and_permissions')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('structure-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['terms-and-conditions-content.index', 'about-content.index', 'infos.index', ])? 'menu-open': '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.info_control')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('about-content.index') }}"
                               class="nav-link {{ in_array(request()->route()->getName(),['about-content.index'])? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.about_page')</p>
                            </a>
                        </li>
                        <li
                            class="nav-item">
                            <a href="{{ route('terms-and-conditions-content.index') }}" class="nav-link {{ in_array(request()->route()->getName(),['terms-and-conditions-content.index'])? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.terms')</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endpermission
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
