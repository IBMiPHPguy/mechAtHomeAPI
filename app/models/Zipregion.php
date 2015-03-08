<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Zipregion extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public static $regValRules = array(
    'region_id'=>'required|exists:regions,id',
    'zip'=>'required|integer',
  );

	protected $fillable = ['region_id','zip'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'zipregions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
