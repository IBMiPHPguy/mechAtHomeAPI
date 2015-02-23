<?php

class AddressController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * NOTE: Only an ADMIN will be able
	 * to get a full list of addresses
	 * stored in the application.
	 *
	 * @return JSON Response
	 */
	public function index()
	{
		//
		return Address::all();
	}


	/**
	 * API Application. This RESTful method is not
	 * required.
	 *
	 * @return JSON response for Method not allowed.
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
		$validator = Validator::make(Input::all(), Address::$regValRules);
		if ($validator->passes()) {
		    $address = new Address;
				$address->user_id = Input::get('user_id');
				$address->address_type = Input::get('address_type');
				$address->short_name = trim(Input::get('short_name'));
				$address->addr1 = trim(Input::get('addr1'));
				$address->addr2 = trim(Input::get('addr2'));
				$address->addr3 = trim(Input::get('addr3'));
				$address->city = trim(Input::get('city'));
				$address->state = trim(Input::get('state'));
				$address->zip = trim(Input::get('zip'));
				$address->cross_street = trim(Input::get('cross_street'));
				$address->billing_flag = Input::get('billing_flag');
				$geoAddr = $address->addr1 . ', ' . $address->city . ', ' . $address->state . ', ' . $address->zip;
				$geoCodeResponse = Geocode::make()->address($geoAddr);
				if ($geoCodeResponse) {
						$address->lng = $geoCodeResponse->latitude();
						$address->lat = $geoCodeResponse->longitude();
				}
				$address->save();

				// Return Success JSON with User object info and token.
        return Response::json(array('success' => true, 'message' => 'User address created', 'address' => $address));
		} else {
		    // validation has failed, display error messages
			  return Response::json(array('success' => false, 'message' => $validator->messages(), 'address' => null));
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
	}


}
