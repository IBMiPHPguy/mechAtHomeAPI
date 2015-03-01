<?php

class VehicleController extends \BaseController {

	/**
	 * Get a JSON listing of vehicle make and models based on year of
   * manufacture. First check memcache for the information. If
	 * not in memcache, get the information from Edmunds API.
	 *
   * @param year : integer(4)
	 * @return JSON Response
	 */
	public function getMakeModels($year)
	{
		//
		$memcacheKey = $year . 'MakeModels';
		if (Cache::has($memcacheKey)){
			$myReturn = Cache::get($memcacheKey);
			$cached = true;
		} else {
			$myReturn = Common::edmundsVehicleMakeModels($year);
			$cached = false;
		}
		return Response::json(array('success' => true, 'cached' => $cached, 'message' => $myReturn ));
	}

  /**
	 * Get a JSON listing of vehicle styles based on year, make and model
   * of the vehicle. First check memcache for the information. If not
	 * in memcache, get the information from the Edmunds API.
	 *
   * @param   year  : integer(4),
   *          make  : string,
   *          model : string
	 * @return JSON Response
	 */
  public function getStyles($year, $make, $model)
	{
		//
		$memcacheKey = $year.'*'.str_replace(" ", "_", $make).'*'.str_replace(" ", "_", $model);
		if (Cache::has($memcacheKey)){
			$myReturn = Cache::get($memcacheKey);
			$cached = true;
		} else {
			$myReturn = Common::edmundsVehicleStyles($year, $make, $model);
			$cached = false;
		}
		return Response::json(array('success' => true, 'cached' => $cached, 'message' => $myReturn ));
	}

  /**
	 * Get a JSON listing of vehicle information based on VIN
	 *
   * @param   vin string(17)
	 * @return  JSON Response
	 */
  public function getVehicleInfoByVIN($vin) {
    //
		return Response::json(array('success' => true, 'message' => Common::edmundsVehicleByVIN($vin)));
  }
}
