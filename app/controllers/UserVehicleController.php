<?php

class UserVehicleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			return UserVehicle::all();
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return Response::json(array('success' => false, 'message' => 'Method not allowed.'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == Input::get('user_id')) {
			$validator = Validator::make(Input::all(), UserVehicle::$regValRules);
			if ($validator->passes()) {
			    $vehicle = new UserVehicle;
					$vehicle->user_id = Input::get('user_id');
					$vehicle->short_name = trim(Input::get('short_name'));
					$vehicle->year = Input::get('year');
					$vehicle->make = trim(Input::get('make'));
					$vehicle->model = trim(Input::get('model'));
					$vehicle->style = trim(Input::get('style'));
					$vehicle->style_id = Input::get('style_id');
					$vehicle->vin = trim(Input::get('vin'));
					$vehicle->vehicle_note = trim(Input::get('vehicle_note'));
					$vehicle->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'User vehicle created', 'vehicle' => $vehicle));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'vehicle' => null));
			}
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$vehicle = UserVehicle::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $vehicle->user_id) {
			return Response::json(array('success' => true, 'message' => 'User vehicle retrieved', 'vehicle' => $vehicle));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		return Response::json(array('success' => false, 'message' => 'Method not allowed.'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$vehicle = UserVehicle::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $vehicle->user_id) {
			$validator = Validator::make(Input::all(), UserVehicle::$regValRules);
			if ($validator->passes()) {
					$vehicle->user_id = Input::get('user_id');
					$vehicle->short_name = trim(Input::get('short_name'));
					$vehicle->year = Input::get('year');
					$vehicle->make = trim(Input::get('make'));
					$vehicle->model = trim(Input::get('model'));
					$vehicle->style = trim(Input::get('style'));
					$vehicle->style_id = Input::get('style_id');
					$vehicle->vin = trim(Input::get('vin'));
					$vehicle->vehicle_note = trim(Input::get('vehicle_note'));
					$vehicle->save();
					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'User vehicle updated', 'vehicle' => $vehicle));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'vehicle' => null));
			}
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$vehicle = UserVehicle::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $vehicle->user_id) {
			$vehicle->delete();
			return Response::json(array('success' => true, 'message' => 'User vehicle deleted'));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}
}
