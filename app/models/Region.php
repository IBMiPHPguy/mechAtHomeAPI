<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Region extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'region_name'=>'required',
    'region_code'=>'required',
  );

	protected $fillable = ['region_name','region_code'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'regions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
