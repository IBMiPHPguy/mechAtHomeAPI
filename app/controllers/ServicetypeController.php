<?php

class ServicetypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Servicetype::all();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Servicetype::$regValRules);
		if ($validator->passes()) {
		    $servicetype = new Servicetype;
				$servicetype->servtype_name = trim(Input::get('servtype_name'));
				$servicetype->save();

				// Return Success JSON with User object info and token.
        return Response::json(array(
					'success' => true,
					'message' => 'Service type created',
					'Service Type' => $servicetype,
				));
		} else {
		    // validation has failed, display error messages
			  return Response::json(array(
					'success' => false,
					'message' => $validator->messages(),
					'Service Type' => null,
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
		$servicetype = Servicetype::where('id', '=', $id)->first();
		return Response::json(array(
			'success' => true,
			'message' => 'Service type retrieved',
			'Service Type' => $servicetype,
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
			$validator = Validator::make(Input::all(), Servicetype::$regValRules);
			if ($validator->passes()) {
					$servicetype = Servicetype::where('id', '=', $id)->first();
					$servicetype->servtype_name = trim(Input::get('servtype_name'));
					$servicetype->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array(
						'success' => true,
						'message' => 'Service type updated',
						'Service Type' => $servicetype,
					));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array(
						'success' => false,
						'message' => $validator->messages(),
						'Service Type' => null,
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
			$servicetype = Servicetype::where('id', '=', $id)->first();
			$servicetype->delete();
			return Response::json(array(
				'success' => true,
				'message' => 'Service type deleted',
			));
	}


}
