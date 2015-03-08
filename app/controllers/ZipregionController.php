<?php

class ZipregionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			return Zipregion::all();
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
			));
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
			$validator = Validator::make(Input::all(), Zipregion::$regValRules);
			if ($validator->passes()) {
			    $zipregion = new Zipregion;
					$zipregion->region_id = trim(Input::get('region_id'));
					$zipregion->zip = trim(Input::get('zip'));
					$zipregion->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array(
						'success' => true,
						'message' => 'Zip region created',
						'Zip region' => $zipregion,
					));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array(
						'success' => false,
						'message' => $validator->messages(),
						'Zip region' => null,
					));
			}
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
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
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$zipregion = Zipregion::where('id', '=', $id)->first();
			return Response::json(array(
				'success' => true,
				'message' => 'Zip region retrieved',
				'Zip region' => $zipregion,
			));
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
			));
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
			$validator = Validator::make(Input::all(), Zipregion::$regValRules);
			if ($validator->passes()) {
					$zipregion = Zipregion::where('id', '=', $id)->first();
					$zipregion->region_id = trim(Input::get('region_id'));
					$zipregion->zip = trim(Input::get('zip'));
					$zipregion->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array(
						'success' => true,
						'message' => 'Zip region updated',
						'Zip region' => $zipregion,
					));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array(
						'success' => false,
						'message' => $validator->messages(),
						'Zip region' => null,
					));
			}
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
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
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			$zipregion = Zipregion::where('id', '=', $id)->first();
			$zipregion->delete();
			return Response::json(array(
				'success' => true,
				'message' => 'Zip region deleted',
			));
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
			));
		}
	}


}
