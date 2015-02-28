<?php

class VehicleController extends \BaseController {

	/**
	 * Get a JSON listing of vehicle make and models based on year of
   * manufacture.
	 *
   * @param year : integer(4)
	 * @return JSON Response
	 */
	public function getMakeModels($year)
	{
		//
		return Response::json(array('success' => true, 'message' => Common::edmundsVehicleMakeModels($year)));
	}

  /**
	 * Get a JSON listing of vehicle styles based on year, make and
   * model of vehicle.
	 *
   * @param   year  : integer(4),
   *          make  : string,
   *          model : string
	 * @return JSON Response
	 */
  public function getStyles($year, $make, $model)
	{
		//
		return Response::json(array('success' => true, 'message' => Common::edmundsVehicleStyles($year, $make, $model)));
	}
}
