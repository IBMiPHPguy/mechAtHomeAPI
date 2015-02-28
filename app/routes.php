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

// Protected Routes that require an API token
Route::group(array('before' => 'auth.token'), function() {
  Route::get('/logout', 'UserController@logout');
  Route::resource('address', 'UserAddressController');
  Route::resource('phone', 'UserPhoneController');
});
