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
});


Route::middleware(['auth'])->group(function () {
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
    Route::get('/testforapplicationandaddress', 'App\Http\Controllers\TestAppAddress@index')->name('testforapplicationandaddress.index');

    // график работы операторов
    Route::get('/operatorshedule', 'App\Http\Controllers\OperatorSheduleController@index')->name('operatorshedule.index');
    Route::get('/operator', 'App\Http\Controllers\OperatorSettingsController@index')->name('OperatorSettings.index');
    Route::post('/operatorsheduleadd', 'App\Http\Controllers\OperatorSettingsController@store')->name('OperatorSettingsAdd.store');

    // список заявок оператора
    Route::get('/applicationsoperator/{id}', 'App\Http\Controllers\ApplicationOperatorController@show')->name('operatorapplication.show');
    

    // график работы логистов
    Route::get('/logistics', 'App\Http\Controllers\LogisticSettingsController@index')->name('logisticshedule.index');
    Route::get('/logisticshedule', 'App\Http\Controllers\LogisticSheduleController@index')->name('LogisticSettings.index');
    Route::post('/logisticsheduleAdd', 'App\Http\Controllers\LogisticSettingsController@store')->name('LogisticSettingsAdd.store');
    

    Route::get('/metrolog', 'App\Http\Controllers\Metrlog@index')
        ->middleware(['auth', 'CheckRoleMiddlware:metrolog, administrator'])
        ->name('metrlog.index');

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/testfias', function () {
        return view('tesfiasapi');
    })->name('fias');

    
    Route::post('/api/getAddressItems', 'App\Http\Controllers\ApiController@getAddressItems');
    Route::post('/api/postAddress', 'App\Http\Controllers\ApiController@postAddress');
    Route::post('/api/postNewAddress', 'App\Http\Controllers\ApiController@postNewAddress');

});


Auth::routes();

