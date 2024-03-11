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


    Route::get('/applicationsandaddresses/{id}/edit', 'App\Http\Controllers\ShowApplicationAndAddressesController@edit')->name('applicationsandaddresses.edit');
    Route::put('/applicationsandaddresses/{id}', 'App\Http\Controllers\ShowApplicationAndAddressesController@update')->name('updateappandaddress.update');
    Route::get('/testforapplicationandaddress', 'App\Http\Controllers\TestAppAddress@index')->name('testforapplicationandaddress.index');


    // график работы операторов
    Route::get('/operatorshedule', 'App\Http\Controllers\OperatorSheduleController@index')->name('operatorshedule.index');
    Route::get('/operator', 'App\Http\Controllers\OperatorSettingsController@index')->name('OperatorSettings.index');
    Route::post('/operatorsheduleadd', 'App\Http\Controllers\OperatorSettingsController@store')->name('OperatorSettingsAdd.store');
    Route::post('/updateScheduleOperators', 'App\Http\Controllers\OperatorSheduleController@updateScheduleOperator')->name('updateScheduleOperators.updateScheduleOperator');

    // список заявок оператора
    Route::get('/applicationsoperator/{id}', 'App\Http\Controllers\ApplicationOperatorController@show')->name('operatorapplication.show');
    Route::get('/loadApplicationdDataFromDB', 'App\Http\Controllers\RouteForSingleController@loadApplicationdDataFromDB');


    // график работы логистов
    Route::get('/logistics', 'App\Http\Controllers\LogisticSettingsController@index')->name('logisticshedule.index');
    Route::get('/logisticshedule', 'App\Http\Controllers\LogisticSheduleController@index')->name('LogisticSettings.index');
    Route::post('/logisticsheduleAdd', 'App\Http\Controllers\LogisticSettingsController@store')->name('LogisticSettingsAdd.store');
    Route::post('/updateScheduleLogistic', 'App\Http\Controllers\LogisticSheduleController@updateSchedule')->name('updateScheduleLogistics.updateSchedule');
    Route::post('/storeLogistShedule', 'App\Http\Controllers\LogisticSheduleController@storeLogistShedule')->name('updateScheduleLogistics.storeLogistShedule');

    // график работы метрологов
    Route::get('/Metrologs', 'App\Http\Controllers\metrologSettingsController@index')->name('MetrologShedule.index');
    Route::post('/Metrologshedule', 'App\Http\Controllers\metrologSettingsController@store')->name('MetrologSheduleStore.store');
    Route::get('/sheduledMetrolog', 'App\Http\Controllers\metrologShowShedule@index')->name('metrologShowShedule.index');
    Route::post('/updateScheduleMetrolog', 'App\Http\Controllers\metrologShowShedule@updateScheduleMetrolog')->name('updateScheduleMetrolog.updateScheduleMetrolog');
    Route::get('/your_search_route', 'App\Http\Controllers\itinerary@search')->name('your_search_route');


    Route::get('/metrolog', 'App\Http\Controllers\Metrlog@index')
        ->middleware(['auth', 'CheckRoleMiddlware:metrolog, administrator'])
        ->name('metrlog.index');


    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/map', function () {
        return view('tesfiasapi');
    })->name('map');
    Route::get('/routesmap', 'App\Http\Controllers\RouteForSingleController@index')->name('/routersForRoute');


    Route::post('/api/getAddressItems', 'App\Http\Controllers\ApiController@getAddressItems');
    Route::post('/api/postAddress', 'App\Http\Controllers\ApiController@postAddress');
    Route::post('/api/postNewAddress', 'App\Http\Controllers\ApiController@postNewAddress');


    // Работа с картами
    Route::post('/savePolygon', 'App\Http\Controllers\PolygonController@savePolygon');
    Route::get('/loadPolygons', 'App\Http\Controllers\PolygonController@loadPolygons');
    Route::post('/updatePolygon', 'App\Http\Controllers\PolygonController@updatePolygon');
    Route::post('/deletePolygon', 'App\Http\Controllers\PolygonController@deletePolygon');
    Route::get('/getCoordsForAddress', 'App\Http\Controllers\PolygonController@getCoordinatesFromAddress');
    Route::post('/updateAddressRegion', 'App\Http\Controllers\PolygonController@updateAddressRegion');
    // Route::post('/getAddressesInfo', 'App\Http\Controllers\PolygonController@getAddressesInfo');
    Route::get('/getAddressesInfo', 'App\Http\Controllers\PolygonController@getAddressesInfo');


    Route::post('/postAddressStructureForMap', 'App\Http\Controllers\RouteForSingleController@postAddressStructureForMap');
    Route::post('/postApplicationsIds', 'App\Http\Controllers\RouteForSingleController@postApplicationsIds');
    Route::get('/postAddressStructureForMap', 'App\Http\Controllers\RouteForSingleController@postAddressStructureForMap');
    Route::post('/handleOrder', 'App\Http\Controllers\RouteForSingleController@handleOrder');
    Route::post('/savePolyline', 'App\Http\Controllers\RouteForSingleController@savePolyline');
    Route::get('/loadPolylinesToMap', 'App\Http\Controllers\RouteForSingleController@loadPolylinesToMap');

    // маргрутные листы
    Route::get('/itinerary', 'App\Http\Controllers\itinerary@index')->name('fullList');
    Route::get('/CreateitineraryList', 'App\Http\Controllers\CreateitineraryList@index')->name('CreateitineraryList.index');
    Route::get('/getApplicationById/{id}', 'App\Http\Controllers\CreateitineraryList@getApplicationById')->name('CreateitineraryList.getApplicationById');
    Route::post('/create-route-sheet', 'App\Http\Controllers\RouteSheetController@createRouteSheet');
    Route::get('/route-sheets/{route_sheet_number}', 'App\Http\Controllers\RouteSheetController@viewRouteSheet')->name('route-sheets.viewRouteSheet');
    Route::get('/getAllApplicationsWithFilters', 'App\Http\Controllers\CreateitineraryList@getAllApplicationsWithFilters')->name('getAllApplicationsWithFilters.getAllApplicationsWithFilters');


    Route::get('/addRoleToUser', 'App\Http\Controllers\addRoleToUserController@index')->name('addRoleToUser.index');
    Route::post('/addRoleToUser/update', 'App\Http\Controllers\addRoleToUserController@update')->name('addRoleToUser.update');

    Route::post('/updateTableData', 'App\Http\Controllers\RouteForSingleController@updateTableData');
    

});



Auth::routes();