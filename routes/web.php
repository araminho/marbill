<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CampaignController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [CustomerController::class, 'index'])->name('home');
Route::get('/', [CustomerController::class, 'index']);

Route::prefix('customers')->group(function () {
    Route::get('/create', [CustomerController::class, 'create']);
    Route::post('/', [CustomerController::class, 'store']);
});

Route::prefix('customer-groups')->group(function () {
    Route::get('/', [CustomerGroupController::class, 'index'])->name('groups');
    Route::get('/create', [CustomerGroupController::class, 'create']);
    Route::post('/', [CustomerGroupController::class, 'store']);
    Route::get('/{id}', [CustomerGroupController::class, 'edit']);
    Route::post('/{id}', [CustomerGroupController::class, 'update']);
    Route::get('/{id}/delete', [CustomerGroupController::class, 'delete']);
});

Route::prefix('templates')->group(function () {
    Route::get('/', [TemplateController::class, 'index'])->name('templates');
    Route::get('/create', [TemplateController::class, 'create']);
    Route::post('/', [TemplateController::class, 'store']);
});

Route::prefix('campaigns')->group(function () {
    Route::get('/', [CampaignController::class, 'index'])->name('campaigns');
    Route::get('/create', [CampaignController::class, 'create']);
    Route::post('/', [CampaignController::class, 'store']);
});

