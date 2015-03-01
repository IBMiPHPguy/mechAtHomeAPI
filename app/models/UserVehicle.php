<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserVehicle extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'user_id'=>'required|exists:users,id',
    'year'=>'required|integer',
		'make'=>'required',
		'model'=>'required',
    'style'=>'required',
    'style_id'=>'required|integer',
  );

	protected $fillable = ['year','make','model','style','style_id','vin','short_name','vehicle_note'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vehicles';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
