<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles all user functions for the application.
  | Including, login authorizations, logout processes, user
  | registration,, etc.
  |
  | Routes:
	|	/login
  | /logout
  | /register
  |
  | Author: Robert Binetti
  | Date: 02/21/2015
  | Version: 1.0
  |
  | ::CHANGE LOG::
  | 1.00  02/21/2015  Initial version. Login and Logout methods.
  | 1.01  02/22/2015  Registration method added.
	|
	*/

	public function login()
	{
    // Attempt the password / email combination for
    // Authentication

    if (Auth::attempt(Input::only('email','password')))
    {
        // Email/Password combo good. Get User ID from Auth Object
        $id = Auth::user()->id;

        // Using User ID set up a User Object to save API Token and
        // API token last used Date & Time.
        $user = User::find($id);
        $user->api_token = hash('sha256',Str::random(10),false);
        $user->api_dt = date('Y-m-d H:i:s');
        $user->save();

        // Return Success JSON with User object info and token.
        return Response::json(array('success' => true, 'message' => 'User Authenticated', 'token' => $user->api_token, 'user' => $user));
    } else {
        // Email/Password combo failed. Return Failure JSON with message.
        return Response::json(array('success' => false, 'message' => 'User Authentication failed.', 'token' => null, 'user' => null));
    }
	} // login method END

	public function register()
	{
		// This method performs the registration functions for a
		// new user of the application. Validation of the form
		// occurs in this method as well.

		$validator = Validator::make(Input::all(), User::$regValRules);
		if ($validator->passes()) {
		    $user = new User;
		    $user->fname = Input::get('fname');
		    $user->lname = Input::get('lname');
				$user->minit = Input::get('minit');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
				$user->user_type = 'USER';
		    $user->save();

				// Return Success JSON with User object info and token.
        return Response::json(array('success' => true, 'message' => 'User created', 'user' => $user));
		} else {
		    // validation has failed, display error messages
			  return Response::json(array('success' => false, 'message' => $validator->messages(), 'user' => null));
		}
	}

  public function logout()
  {
    // Method to log the user out of the application
    // This method is prefiltered to make sure that the token
    // is active.

    // Get the Token from the request.
    $token = Request::header('X-Auth-Token');

    // Get the User record for the token and null out the
    // token and api_dt fields to facilitate the logout
    // process.
    $user =  User::where('api_token', '=', $token)->firstOrFail();
    $user->api_token = null;
    $user->api_dt = null;
    $user->save();

    // Return the success JSON on the logout.
    return Response::json(array('success' => true, 'message' => 'User logged out.', 'user' => $user));
  }
}
