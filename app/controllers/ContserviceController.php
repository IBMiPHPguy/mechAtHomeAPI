<?php

class ContserviceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Contservice::all();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Contservice::$regValRules);
		if ($validator->passes()) {
		    $contservice = new Contservice;
				$contservice->user_id = trim(Input::get('user_id'));
				$contservice->servicetype_id = trim(Input::get('servicetype_id'));
				$contservice->region_id = trim(Input::get('region_id'));
				$contservice->save();

				// Return Success JSON with User object info and token.
        return Response::json(array(
					'success' => true,
					'message' => 'Contractor regional service created',
					'Contractor regional service' => $contservice,
				));
		} else {
		    // validation has failed, display error messages
			  return Response::json(array(
					'success' => false,
					'message' => $validator->messages(),
					'Contractor regional service' => null,
				));
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
		$contservice = Contservice::where('id', '=', $id)->first();
		return Response::json(array(
			'success' => true,
			'message' => 'Contractor regional service retrieved',
			'Contractor regional service' => $contservice,
		));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Contservice::$regValRules);
		if ($validator->passes()) {
				$contservice = Contservice::where('id', '=', $id)->first();
				$contservice->user_id = trim(Input::get('user_id'));
				$contservice->servicetype_id = trim(Input::get('servicetype_id'));
				$contservice->region_id = trim(Input::get('region_id'));
				$contservice->save();

				// Return Success JSON with User object info and token.
        return Response::json(array(
					'success' => true,
					'message' => 'Contractor regional service updated',
					'Contractor regional service' => $contservice,
				));
		} else {
		    // validation has failed, display error messages
			  return Response::json(array(
					'success' => false,
					'message' => $validator->messages(),
					'Contractor regional service' => null,
				));
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
		$contservice = Contservice::where('id', '=', $id)->first();
		$contservice->delete();
		return Response::json(array(
			'success' => true,
			'message' => 'Contractor regional service deleted',
		));
	}


}
