<?php

return array(

  /*
	|--------------------------------------------------------------------------
	| Edmunds Developers Network API key
	|--------------------------------------------------------------------------
	|
	| This is the applications registered API key with the Edmunds Developer
	| network. There is a limit on this public key of no more than 10 calls
	| per second and no more than 5000 calls per day for free access.
	|
	| API documentation can be found at:
  | http://developer.edmunds.com/api-documentation/vehicle/
	|
	*/

  'key' => 'm6dav8sncbvm8dhu323dgzb5',

  /*
	|--------------------------------------------------------------------------
	| Edmunds Developers Network Information time to live in munites
	|--------------------------------------------------------------------------
	|
	| This is the time in minutes that we will store the information
  | received from the Edmunds API, as per the API requirements
  |
	*/
  'minutes' => 1440,

  /*
	|--------------------------------------------------------------------------
	| Edmunds Developers Network API Base URL
	|--------------------------------------------------------------------------
	|
	| This is the base URL we will use to make all our Edmunds API calls.
  |
	*/
  'baseURL' => 'http://api.edmunds.com/api/vehicle/v2',

);
