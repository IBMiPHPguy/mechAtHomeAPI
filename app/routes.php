<?php

/*
|--------------------------------------------------------------------------
| driveByMechanics Application Routes
|--------------------------------------------------------------------------
|
*/

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');

// Protected Routes that require an API token
Route::group(array('before' => 'auth.token'), function() {
  Route::get('/logout', 'UserController@logout');
});
