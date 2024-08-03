<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\Otp\OtpController;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Http\Controllers\Api\V1\Advertisement\AdvertisementController;
use App\Http\Controllers\Api\V1\Doctor\DoctorController;
use App\Http\Controllers\Api\V1\Dependant\DependantController;
use App\Http\Controllers\Api\V1\Rate\RateController;
use App\Http\Controllers\Api\V1\City\CityController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\ContactUs\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::group(['prefix' => 'sign'], function () {
        Route::post('in', 'signIn');
        Route::post('up', 'signUp');
        Route::post('out', 'signOut');
    });
    Route::get('what-is-my-platform', 'whatIsMyPlatform'); // returns 'platform: mobile!'
});


Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::group(['prefix' => 'sign'], function () {
        Route::post('in', 'signIn');
        Route::post('up', 'signUp');
        Route::post('out', 'signOut');
    });
    Route::group(['prefix' => 'otp', 'middleware' => ['auth:api']], function () {
        Route::post('/verify', [OtpController::class, 'verify']);
        Route::get('/', [OtpController::class, 'send']);
    });
});

Route::group(['prefix' => 'profile','controller' => UserController::class], function () {
        Route::get('details', 'getDetails');
        Route::post('update', 'updateMainData');
        Route::post('updatePassword', 'updatePassword');
});

Route::get('ads', [AdvertisementController::class, 'index']);

Route::apiResource('dependants', DependantController::class)->only(['store', 'index']);

Route::apiResource('rates', RateController::class)->only(['store', 'index']);

Route::post('contact-us', [ContactUsController::class, 'store']);

Route::group(['prefix' => 'doctors','controller' => DoctorController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('popular', 'getPopular');
    Route::get('liked', 'getLiked');
    Route::post('like', 'likeDoctor');
    Route::post('unlike', 'unLikeDoctor');
    Route::post('updatePassword', 'updatePassword');
});


Route::get('cities', [CityController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);


