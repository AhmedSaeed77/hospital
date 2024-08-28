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
use App\Http\Controllers\Api\V1\Book\BookController;
use App\Http\Controllers\Api\V1\Structure\AboutController;
use App\Http\Controllers\Api\V1\Info\InfoSiteController;
use App\Http\Controllers\Api\V1\Structure\TermsAndConditionsController;
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
    Route::group(['prefix' => 'otp'], function () {
        Route::post('/verify', [OtpController::class, 'verify']);
        Route::post('/', [OtpController::class, 'send']);
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

Route::apiResource('book', BookController::class);
Route::post('book/cancel/{id}', [BookController::class, 'cancel']);

Route::post('contact-us', [ContactUsController::class, 'store']);

Route::group(['prefix' => 'doctors','controller' => DoctorController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('/{id}/qualifications', 'getQualifications');
    Route::get('/{id}/rates', 'getRates');
    Route::get('popular/doctor', 'getPopular');
    Route::get('like/doctor', 'getLiked');
    Route::post('like', 'likeDoctor');
    Route::post('unlike', 'unLikeDoctor');
    Route::post('updatePassword', 'updatePassword');
});


Route::get('cities', [CityController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('genders', [CategoryController::class, 'indexGender']);
Route::get('cancel-reason', [CategoryController::class, 'indexCancelReason']);


Route::get('terms-and-conditions', TermsAndConditionsController::class);
Route::get('about-us', AboutController::class);
Route::get('info',InfoSiteController::class);



Route::get('clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return "done";
});

Route::get('storage', function () {
    Artisan::call('storage:link');
    return "done";
});

