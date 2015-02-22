<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'fname'=>'required|alpha|min:2',
    'lname'=>'required|alpha|min:2',
		'minit'=>'alpha|max:1',
    'email'=>'required|email|unique:users',
    'password'=>'required|alpha_num|min:8|confirmed',
    'password_confirmation'=>'required|alpha_num|min:8'
  );
	
	protected $fillable = ['email','password','fname','lname','minit','user_type'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'api_token', 'api_dt');

}
