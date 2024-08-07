<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Info\InfoController;
use App\Http\Controllers\Dashboard\Structure\AboutController;
use App\Http\Controllers\Dashboard\Structure\TermsAndConditionsController;

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

        Route::group(['prefix' => 'structures'], function () {
            Route::resource('about-content', AboutController::class)->only(['index', 'store']);
            Route::resource('terms-and-conditions-content', TermsAndConditionsController::class)->only(['index', 'store']);
        });

        Route::get('infos/edit',[InfoController::class,'edit'])->name('infos.edit');
        Route::post('infos/update',[InfoController::class,'update'])->name('infos.update');

    });
});
