<?php

class ServicetypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			return Servicetype::all();
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$validator = Validator::make(Input::all(), Servicetype::$regValRules);
			if ($validator->passes()) {
			    $servicetype = new Servicetype;
					$servicetype->servtype_name = trim(Input::get('servtype_name'));
					$servicetype->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'Service type created', 'Service Type' => $servicetype));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'Service Type' => null));
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
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$servicetype = Servicetype::where('id', '=', $id)->first();
			return Response::json(array('success' => true, 'message' => 'Service type retrieved', 'Service Type' => $servicetype));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
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
			$validator = Validator::make(Input::all(), Servicetype::$regValRules);
			if ($validator->passes()) {
					$servicetype = Servicetype::where('id', '=', $id)->first();
					$servicetype->servtype_name = trim(Input::get('servtype_name'));
					$servicetype->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'Service type updated', 'Service Type' => $servicetype));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'Service Type' => null));
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
			$servicetype = Servicetype::where('id', '=', $id)->first();
			$servicetype->delete();
			return Response::json(array('success' => true, 'message' => 'Service type deleted'));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}


}
