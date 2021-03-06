<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Service extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'service_name'=>'required',
    'servicetype_id'=>'required|exists:servicetypes,id',
		'service_desc'=>'required',
		'amount'=>'required|numeric',
  );

	protected $fillable = ['service_name','servicetype_id','service_desc','amount'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'services';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
