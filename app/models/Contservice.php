<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Contservice extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'user_id'=>'required|exists:users,id,user_type,"CONT"',
    'servicetype_id'=>'required|exists:servicetypes,id',
		'region_id'=>'required|exists:regions,id',
  );

	protected $fillable = ['user_id','servicetype_id','region_id'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contservices';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
