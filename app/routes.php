<?php

/*
|--------------------------------------------------------------------------
| driveByMechanics Application Routes
| Git+Plus
|--------------------------------------------------------------------------
|
*/

Route::post('/login', 'UserController@login');

Route::group(array('before' => 'auth.token'), function() {
  Route::get('/logout', 'UserController@logout');
});

// Filter for protected resources that require an API token
Route::filter('auth.token', function($route, $request)
{
		// Get the token from the request header X-Auth-Token
    $token = $request->header('X-Auth-Token');

		// Find a user record with the token
    $user =  User::where('api_token', '=', $token)->first();

		// If the header is not set or we cant find a user with that token
		// respond withe a 'Not Authenticated' 401 JSON error return.
		if(!$token || !$user) {
        $response = Response::json([
            'success' => false,
            'message' => 'Not authenticated',
            'code' => 401],
            401
        );
        $response->header('Content-Type', 'application/json');
    return $response;
    }
});
