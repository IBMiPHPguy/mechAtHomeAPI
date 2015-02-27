<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAddress extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'user_id'=>'required|exists:users,id',
		'address_type'=>'required',
		'addr1'=>'required|min:2',
    'city'=>'required|min:2',
    'state'=>'required|alpha|size:2',
    'zip'=>'required|integer',
    'billing_flag'=>'required|boolean',
  );

	protected $fillable = ['address_type','short_name','addr1','addr2','addr3','city', 'state', 'zip', 'cross_street', 'billing_flag'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_addresses';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
