<?php

class RegionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			return Region::all();
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
			$validator = Validator::make(Input::all(), Region::$regValRules);
			if ($validator->passes()) {
			    $region = new Region;
					$region->region_name = trim(Input::get('region_name'));
					$region->region_code = trim(Input::get('region_code'));
					$region->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array(
						'success' => true,
						'message' => 'Region created',
						'Region' => $region,
					));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array(
						'success' => false,
						'message' => $validator->messages(),
						'Region' => null,
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
			$region = Region::where('id', '=', $id)->first();
			return Response::json(array(
				'success' => true,
				'message' => 'Region retrieved',
				'Region' => $region,
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
			$validator = Validator::make(Input::all(), Region::$regValRules);
			if ($validator->passes()) {
					$region = Region::where('id', '=', $id)->first();
					$region->region_name = trim(Input::get('region_name'));
					$region->region_code = trim(Input::get('region_code'));
					$region->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array(
						'success' => true,
						'message' => 'Region updated',
						'Region' => $region,
					));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array(
						'success' => false,
						'message' => $validator->messages(),
						'Region' => null,
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
			$region = Region::where('id', '=', $id)->first();
			$region->delete();
			return Response::json(array(
				'success' => true,
				'message' => 'Region deleted',
			));
		} else {
			return Response::json(array(
				'success' => false,
				'message' => 'Method not allowed. Must be ADMIN.',
			));
		}
	}


}
