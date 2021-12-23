<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlayGameController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\UserConfigController;
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

Route::middleware('authentication.session:2')->prefix('authentication')->group(function(){
    Route::post('/login', [AuthenticationController::class, "Login"])->name('api.authentication.login');
    Route::post('/register', [AuthenticationController::class, "Register"])->name('api.authentication.register');
});

Route::middleware('authentication.session:2')->prefix('dashboard')->group(function(){
    Route::get('/logout', [AuthenticationController::class, "Logout"])->name('api.authentication.logout');
});

Route::get('gamezone', [ConfigController::class, "CreateZoneConfig"])->name('api.config.zone');

Route::prefix('game')->group(function(){
    Route::get('ranking', [RankingController::class, "Index"])->name('api.game.ranking');
    Route::post('createcharacter', [PlayGameController::class, "CreateCharacter"])->name('api.game.createcharacter');
});

Route::prefix('recharge')->group(function(){
    Route::get('playercharacter', [RechargeController::class, "getPlayerCharacters"])->name('api.recharge.playercharacter');
    Route::post('invoice', [RechargeController::class, "createInvoice"])->name('api.recharge.createinvoice');
});

Route::prefix('config')->group(function(){
    Route::middleware('authentication.session:2')->post('savechanges', [UserConfigController::class, "SaveChanges"])->name('api.config.savechanges');
});

Route::prefix('callback')->group(function(){
    Route::get('mercadopago', [PaymentController::class, "BackMercadoPago"])->name('api.callback.freemerchant');
    Route::post('mercadopago', [PaymentController::class, "BackMercadoPago"])->name('api.callback.freemerchant');

    Route::get('picpay', [PaymentController::class, "BackPicPay"])->name('api.callback.picpay');
    Route::post('picpay', [PaymentController::class, "BackPicPay"])->name('api.callback.picpay');
});