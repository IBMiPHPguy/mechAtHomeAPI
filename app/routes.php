<?php

/*
|--------------------------------------------------------------------------
| driveByMechanics Application Routes
|--------------------------------------------------------------------------
|
*/

Route::post('/login', 'UserController@login');

Route::group(array('before' => 'auth.token'), function() {
  Route::get('/logout', 'UserController@logout');
});
