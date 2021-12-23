<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PlayGameController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\UserConfigController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticationController::class, "Index"])->name('web.app.home');

Route::get('/noticearticle/{id}', [NoticeController::class, "Index"])->name('web.app.article');
Route::get('/articlelist/{article}', [NoticeController::class, "IndexList"])->name('web.app.articlelist');

Route::middleware('authentication.session:1')->get('/playgame/{ZoneID?}', [PlayGameController::class, "Index"])->name('web.app.playgame');
Route::middleware('authentication.session:1')->prefix("center")->group(function(){
    Route::get('/config', [UserConfigController::class, "Config"])->name('web.app.center.config');
    Route::get('/recharge', [RechargeController::class, "Index"])->name('web.app.recharge');
});