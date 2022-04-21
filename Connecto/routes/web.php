<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;


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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', 'admin/services');
    Route::resource('services', Admin\ServiceController::class);
    Route::redirect('/', '/admin/incidents');
    Route::resource('incidents', Admin\IncidentController::class);
});

Route::prefix('home')->name('home.')->group(function () {
    Route::redirect('/', 'home/reports');
    Route::resource('reports', ReportController::class);
    Route::resource('reports.report_options', ReportController::class)->only(['create', 'store']);
    Route::resource('reports', ReportController::class)->except('show');
});
