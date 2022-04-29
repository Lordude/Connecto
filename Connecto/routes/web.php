<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuperAdmin\UserController;

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
Route::get('/', [HomeController::class, 'index']);


Route::prefix('home')->name('home.')->group(function () {
    Route::redirect('/', 'home');
    Route::resource('home', HomeController::class);

});


Route::prefix('superadmin')->name('superadmin.')->group(function() {
    Route::redirect('/', 'superadmin/users');
    Route::resource('users', SuperAdmin\UserController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', 'admin/services');
    Route::redirect('/', '/admin/incidents');
    Route::redirect('/', '/admin/reports_services');
    Route::resource('services', Admin\ServiceController::class);
    Route::resource('incidents', Admin\IncidentController::class);
    Route::resource('states', Admin\StateController::class);
    Route::resource('accounts', Admin\AuthController::class);
    Route::resource('reports_services', Admin\ReportServiceController::class);
    Route::resource('reports.reports_services', Admin\ReportServiceController::class);
});

Route::prefix('home')->name('home.')->group(function () {
    Route::redirect('/', 'home/reports');
    Route::resource('reports', ReportController::class);
    Route::resource('reports.report_options', ReportController::class)->only(['create', 'store']);
    Route::resource('reports', ReportController::class)->except('show');
});

Route::get('/MyAccount', [Admin\AuthController::class, 'show'])->name('MyAccount');
Route::post('/MyAccount', [Admin\AuthController::class, 'update'])->name('UpdatePassWord');
