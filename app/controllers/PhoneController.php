<?php

class PhoneController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if (Common::getUserInfo()->user_type == 'ADMIN') {
			return Phone::all();
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
			$validator = Validator::make(Input::all(), Phone::$regValRules);
			if ($validator->passes()) {
			    $phone = new Phone;
					$phone->user_id = Input::get('user_id');
					$phone->phone_type = Input::get('phone_type');
					$phone->short_name = trim(Input::get('short_name'));
					$phone->text_flag = trim(Input::get('text_flag'));
					$phone->primary_nbr = trim(Input::get('primary_nbr'));
					$phone->phone_nbr = trim(Input::get('phone_nbr'));
					$phone->save();

					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'User phone number created', 'phone' => $phone));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'phone' => null));
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
		$phone = Phone::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $phone->user_id) {
			return Response::json(array('success' => true, 'message' => 'User phone number retrieved', 'phone' => $phone));
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
		$phone = Phone::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $phone->user_id) {
			$validator = Validator::make(Input::all(), Phone::$regValRules);
			if ($validator->passes()) {
					$phone->user_id = Input::get('user_id');
					$phone->phone_type = Input::get('phone_type');
					$phone->short_name = trim(Input::get('short_name'));
					$phone->text_flag = trim(Input::get('text_flag'));
					$phone->primary_nbr = trim(Input::get('primary_nbr'));
					$phone->phone_nbr = trim(Input::get('phone_nbr'));
					$phone->save();
					// Return Success JSON with User object info and token.
	        return Response::json(array('success' => true, 'message' => 'User phone number updated', 'phone' => $phone));
			} else {
			    // validation has failed, display error messages
				  return Response::json(array('success' => false, 'message' => $validator->messages(), 'phone' => null));
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
		$phone = Phone::where('id', '=', $id)->first();
		if (Common::getUserInfo()->user_type == 'ADMIN' || Common::getUserInfo()->id == $phone->user_id) {
			$phone->delete();
			return Response::json(array('success' => true, 'message' => 'User phone number deleted'));
		} else {
			return Response::json(array('success' => false, 'message' => 'Method not allowed. Must be ADMIN.'));
		}
	}
}
