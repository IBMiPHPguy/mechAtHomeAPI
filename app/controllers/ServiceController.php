<?php

class ServiceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Service::all();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$validator = Validator::make(Input::all(), Service::$regValRules);
			if ($validator->passes()) {
			    $service = new Service;
					$service->service_name = trim(Input::get('service_name'));
					$service->service_type = trim(Input::get('service_type'));
					$service->service_desc = trim(Input::get('service_desc'));
					$service->amount = Input::get('amount');
					$service->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'Service created', 'service' => $service));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'service' => null));
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
		$service = Service::where('id', '=', $id)->first();
		return Response::json(array('success' => true, 'message' => 'Service retrieved', 'service' => $service));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$validator = Validator::make(Input::all(), Service::$regValRules);
			if ($validator->passes()) {
					$service = Service::where('id', '=', $id)->first();
					$service->service_name = trim(Input::get('service_name'));
					$service->service_type = trim(Input::get('service_type'));
					$service->service_desc = trim(Input::get('service_desc'));
					$service->amount = Input::get('amount');
					$service->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'Service updated', 'service' => $service));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'service' => null));
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
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$service = Service::where('id', '=', $id)->first();
			$service->delete();
			return Response::json(array('success' => true, 'message' => 'Service deleted'));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}


}
