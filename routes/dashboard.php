<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Experience\ExperienceController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Qualification\QualificationController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Info\InfoController;
use App\Http\Controllers\Dashboard\Structure\AboutController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\City\CityController;
use App\Http\Controllers\Dashboard\CancelReason\CancelReasonController;
use App\Http\Controllers\Dashboard\Gender\GenderController;
use App\Http\Controllers\Dashboard\Dependant\DependantController;
use App\Http\Controllers\Dashboard\Advertisement\AdvertisementController;
use App\Http\Controllers\Dashboard\Structure\TermsAndConditionsController;
use App\Http\Controllers\Dashboard\Roles\RoleController;
use App\Http\Controllers\Dashboard\Mangers\MangerController;
use App\Http\Controllers\Dashboard\Settings\SettingController;
use App\Http\Controllers\Dashboard\Doctor\DoctorController;
use App\Http\Controllers\Dashboard\Time\TimeController;
use App\Http\Controllers\Dashboard\Booking\BookingController;
use App\Http\Controllers\Dashboard\DoctorBooking\DoctorBookingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', [AuthController::class, '_login'])->name('_login');

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('/');
        Route::resource('users', UserController::class);
        Route::resource('/users/{id}/dependant', DependantController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('cities', CityController::class);
        Route::resource('cancel-reasons', CancelReasonController::class);
        Route::resource('genders', GenderController::class);
        Route::resource('advertisements', AdvertisementController::class);
        Route::resource('doctors', DoctorController::class);
        Route::resource('{doctor_id}/experiences', ExperienceController::class);
        Route::resource('{doctor_id}/qualifications', QualificationController::class);
        Route::resource('{doctor_id}/times', TimeController::class);

        Route::resource('doctor_bookings', DoctorBookingController::class);

        Route::resource('bookings', BookingController::class);
        Route::get('bookings/change-status/{id}', [BookingController::class,'changeStatus'])->name('bookings.changeStatus');

        Route::group(['prefix' => 'structures'], function () {
            Route::resource('about-content', AboutController::class)->only(['index', 'store']);
            Route::resource('terms-and-conditions-content', TermsAndConditionsController::class)->only(['index', 'store']);
        });
        Route::resource('settings', SettingController::class)->only('edit', 'update');
        Route::post('update-password', [SettingController::class, 'updatePassword'])->name('update-password');
        Route::resource('managers', MangerController::class)->except('show', 'index');
        Route::resource('roles', RoleController::class);
        Route::get('role/{id}/managers', [RoleController::class, 'mangers'])->name('roles.mangers');

        Route::get('infos/edit',[InfoController::class,'edit'])->name('infos.edit');
        Route::post('infos/update',[InfoController::class,'update'])->name('infos.update');

    });
});
