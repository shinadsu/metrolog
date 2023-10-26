<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/order', 'App\Http\Controllers\OrderController@index')->name('order.index');
Route::get('/InfoAboutWorkers', 'App\Http\Controllers\InfoAboutMetrologController@index')->name('InfoAboutWorkers.index');
Route::get('/create', 'App\Http\Controllers\CustomAppController@index')->name('create.index');
Route::post('/create', 'App\Http\Controllers\CustomAppController@store')->name('create.store');
Route::get('/addresses', 'App\Http\Controllers\ShowAddressController@index')->name('addresses.index');
Route::get('/contacts', 'App\Http\Controllers\ShowContactsController@index')->name('contacts.index');
Route::get('/applicationsandaddresses', 'App\Http\Controllers\ShowApplicationAndAddressesController@index')->name('applicationsandaddresses.index');
Route::get('/applications/{id}', 'App\Http\Controllers\Metrlog@show')->name('applications.show');
Route::post('/devices', 'App\Http\Controllers\DeviceController@store')->name('devices.store');

Auth::routes();

Route::get('/devices', 'App\Http\Controllers\ShowDeviceController@index')->name('devices.index');

Route::get('/metrolog', 'App\Http\Controllers\Metrlog@index')
        ->middleware(['auth', 'CheckRoleMiddlware:metrolog,administrator'])
        ->name('metrlog.index');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');