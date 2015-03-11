<?php

/*
|--------------------------------------------------------------------------
| driveByMechanics Application Routes
|--------------------------------------------------------------------------
|
*/

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/passwordRemind', 'RemindersController@postRemind');
Route::post('/passwordReset', 'RemindersController@postReset');
Route::get('/getVehicleMakeModels/{year}', 'VehicleController@getMakeModels');
Route::get('/getVehicleStyles/{year}/{make}/{model}', 'VehicleController@getStyles');
Route::get('/getVehicleInfoByVIN/{vin}', 'VehicleController@getVehicleInfoByVIN');
Route::get('/getServices', 'ServiceController@index');
Route::get('/getService/{id}', 'ServiceController@show');

// Protected Routes that require an API token
Route::group(array('before' => 'auth.token'), function() {
  Route::get('/logout', 'UserController@logout');
  Route::resource('/userAddress', 'UserAddressController');
  Route::resource('/userPhone', 'UserPhoneController');
  Route::resource('/userVehicle', 'UserVehicleController');
  Route::group(array('before' => 'check.admin'), function() {
    Route::post('/createService', 'ServiceController@store');
    Route::put('/editService/{id}', 'ServiceController@update');
    Route::delete('/deleteService/{id}', 'ServiceController@destroy');
    Route::resource('/serviceType', 'ServicetypeController');
    Route::resource('/region', 'RegionController');
    Route::resource('/zipRegion', 'ZipregionController');
    Route::resource('/contRegionSrvc', 'ContserviceController');
  });
});
