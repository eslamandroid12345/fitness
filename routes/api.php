<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentMethodClientController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ResetPassword\CodeCheckController;
use App\Http\Controllers\Api\ResetPassword\ForgotPasswordController;
use App\Http\Controllers\Api\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Api\StripePaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'lang'], function (){

    Route::group(['prefix' => 'user'], function (){

        Route::post('login',[AuthController::class,'login']);
        Route::post('register',[AuthController::class,'register']);
    });


    Route::group(['prefix' => 'user','middleware' => 'jwt'], function (){

     Route::post('logout',[AuthController::class,'logout']);
     Route::get('get-profile',[AuthController::class,'getProfile']);
     Route::post('edit-profile',[AuthController::class,'editProfile']);
     Route::post('contact-us',[AuthController::class,'contactUs']);
     Route::get('privacy-and-policy',[AuthController::class,'privacyAndPolicy']);
     Route::get('setting-app',[AuthController::class,'settingApp']);

    });


    Route::group(['prefix' => 'programs','middleware' => 'jwt'], function (){

        Route::get('programDetailsById/{id}',[ProgramController::class,'programDetailsById']);
        Route::get('dayDetailsById/{id}',[ProgramController::class,'dayDetailsById']);
        Route::get('exerciseDetailsById/{id}',[ProgramController::class,'exerciseDetailsById']);

    });


    Route::group(['middleware' => 'jwt'], function (){

        Route::post('stripe/{id}',[StripePaymentController::class,'stripePost']);
        Route::get('program-details/{id}',[StripePaymentController::class,'programDetailSubscribe']);
        Route::get('programs',[ProgramController::class,'programs']);

    });

    Route::group(['prefix' => 'payment-methods','middleware' => 'jwt'], function (){

        Route::post('create-new-payment',[PaymentMethodClientController::class,'createNewPayment']);
        Route::get('select-all-payments',[PaymentMethodClientController::class,'selectAllPayments']);

    });


    Route::post('forget-password',  ForgotPasswordController::class);
    Route::post('check-code', CodeCheckController::class);
    Route::post('password-reset', ResetPasswordController::class);


});
