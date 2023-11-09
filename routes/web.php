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

// Route::get('/order', 'App\Http\Controllers\OrderController@index')->name('order.index');
// Route::get('/InfoAboutWorkers', 'App\Http\Controllers\InfoAboutMetrologController@index')->name('InfoAboutWorkers.index');
// Route::get('/create', 'App\Http\Controllers\CustomAppController@index')->name('create.index');
// Route::post('/create', 'App\Http\Controllers\CustomAppController@store')->name('create.store');
// Route::get('/addresses', 'App\Http\Controllers\ShowAddressController@index')->name('addresses.index');
// Route::get('/contacts', 'App\Http\Controllers\ShowContactsController@index')->name('contacts.index');
// Route::get('/applicationsandaddresses', 'App\Http\Controllers\ShowApplicationAndAddressesController@index')->name('applicationsandaddresses.index');
// Route::get('/applications/{id}', 'App\Http\Controllers\Metrlog@show')->name('applications.show');
// Route::post('/devices', 'App\Http\Controllers\DeviceController@store')->name('devices.store');
// Route::get('/userrequisitessettings', 'App\Http\Controllers\UserRequisitesSettings@index')->name('userrequisitessettings.index');
// Route::post('/userrequisitessettings', 'App\Http\Controllers\UserRequisitesSettings@store')->name('userrequisitessettings.store');
// Route::get('/statustransition', 'App\Http\Controllers\statustransitionsController@index')->name('statustransitionsController.index');
// Route::post('/statustransition', 'App\Http\Controllers\statustransitionsController@store')->name('statustransitionsController.post');

Route::middleware(['auth.redirect'])->group(function () {
    Route::get('/order', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/InfoAboutWorkers', 'App\Http\Controllers\InfoAboutMetrologController@index')->name('InfoAboutWorkers.index');
    Route::get('/create', 'App\Http\Controllers\CustomAppController@index')->name('create.index');
    Route::post('/create', 'App\Http\Controllers\CustomAppController@store')->name('create.store');
    Route::get('/addresses', 'App\Http\Controllers\ShowAddressController@index')->name('addresses.index');
    Route::get('/contacts', 'App\Http\Controllers\ShowContactsController@index')->name('contacts.index');
    Route::get('/applicationsandaddresses', 'App\Http\Controllers\ShowApplicationAndAddressesController@index')->name('applicationsandaddresses.index');
    Route::get('/applications/{id}', 'App\Http\Controllers\Metrlog@show')->name('applications.show');
    Route::post('/devices', 'App\Http\Controllers\DeviceController@store')->name('devices.store');
    Route::get('/userrequisitessettings', 'App\Http\Controllers\UserRequisitesSettings@index')->name('userrequisitessettings.index');
    Route::post('/userrequisitessettings', 'App\Http\Controllers\UserRequisitesSettings@store')->name('userrequisitessettings.store');
    Route::get('/statustransition', 'App\Http\Controllers\statustransitionsController@index')->name('statustransitionsController.index');
    Route::post('/statustransition', 'App\Http\Controllers\statustransitionsController@store')->name('statustransitionsController.post');
    Route::get('/devices', 'App\Http\Controllers\ShowDeviceController@index')->name('devices.index');
    Route::get('/fiasapi', 'App\Http\Controllers\TestFiasApiController@index')->name('fiasapi.index');
    Route::get('/applicationsandaddresses/{id}/edit', 'App\Http\Controllers\ShowApplicationAndAddressesController@edit')->name('applicationsandaddresses.edit');
    Route::put('/applicationsandaddresses/{id}', 'App\Http\Controllers\ShowApplicationAndAddressesController@update')->name('updateappandaddress.update');


    Route::post('/proxy/fias', function () {
        $response = Http::withHeaders([
            'master-token' => 'ваш-master-token',
            'Accept' => 'application/json'
        ])->post('https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems', request()->all());
    
        return $response->body();
    });

    Route::get('/metrolog', 'App\Http\Controllers\Metrlog@index')
        ->middleware(['auth', 'CheckRoleMiddlware:metrolog, administrator'])
        ->name('metrlog.index');

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/testfias', function () {
        return view('tesfiasapi');
    })->name('fias');

    // Работа с fias api
    // Route::get('/api/getAddressHint', 'App\Http\Controllers\ApiController@getAddressHint');
    // Route::get('/api/searchAddressHint', 'App\Http\Controllers\ApiController@searchAddressHint');
    Route::get('/api/getAddressItems', 'App\Http\Controllers\ApiController@getAddressItems');
    Route::post('/api/postAddress', 'App\Http\Controllers\ApiController@postAddress');



});

Auth::routes();

// Auth::routes();

// Route::get('/devices', 'App\Http\Controllers\ShowDeviceController@index')->name('devices.index');

// Route::get('/metrolog', 'App\Http\Controllers\Metrlog@index')
//         ->middleware(['auth', 'CheckRoleMiddlware:metrolog,administrator'])
//         ->name('metrlog.index');

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');