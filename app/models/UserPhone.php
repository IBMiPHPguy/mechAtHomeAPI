<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserPhone extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'user_id'=>'required|exists:users,id',
		'phone_type'=>'required',
		'text_flag'=>'required|boolean',
    'primary_nbr'=>'required|boolean',
    'phone_nbr'=>'required|integer',
  );

	protected $fillable = ['phone_type','short_name','text_flag','primary_nbr','phone_nbr'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_phones';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
