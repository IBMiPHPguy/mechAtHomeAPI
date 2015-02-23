<?php

class RemindersController extends Controller {

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Response::json(array('success' => false, 'message' => Lang::get($response)));

			case Password::REMINDER_SENT:
				return Response::json(array('success' => true, 'message' => Lang::get($response)));
		}
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Response::json(array('success' => false, 'message' => Lang::get($response)));

			case Password::PASSWORD_RESET:
				return Response::json(array('success' => true, 'message' => 'Password Reset'));

		}
	}

}
