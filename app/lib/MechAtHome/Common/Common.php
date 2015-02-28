<?php namespace MechAtHome\Common;

class Common {

    /*
    |
    | Common Facade::getUserInfo method
    |
    | Use:    Based on the API token used to access an API resource.
    |         Return the User Object that has that bearer token.
    |
    | Params: null
    | Retrun: PHP object
    |
    | Author:   Robert Binetti
    | Date:     02/28/2015
    | Version:  1.0
    |
    | ::CHANGE LOG::
    | 1.0   RMB   Initial method creation.
    |
    */
    public function getUserInfo() {
        $api_token = \Request::header('X-Auth-Token');
        return \User::where('api_token', '=', $api_token)->first();
    }

    /*
    |
    | Common Facade::edmundsVehicleMakes method
    |
    | Use:    Get from the Edmunds API the makes of vehicles for a
    |         given year.
    |
    | Params: year (int)
    | Retrun: JSON object
    |
    | Author:   Robert Binetti
    | Date:     02/28/2015
    | Version:  1.0
    |
    | ::CHANGE LOG::
    | 1.0   RMB   Initial method creation.
    |
    */
    public function edmundsVehicleMakeModels($year) {
        $key = \Config::get('edmundsAPI.key');
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://api.edmunds.com/api/vehicle/v2/makes?fmt=json&year='.$year.'&api_key='.$key);
        return $response->json();
    }

    /*
    |
    | Common Facade::edmundsVehicleStyles method
    |
    | Use:    Get from the Edmunds API the styles of a vehicle
    |         based on the year, make and model parameters.
    |
    | Params: year (int)
    |         make (string)
    |         model (string)
    | Retrun: JSON object
    |
    | Author:   Robert Binetti
    | Date:     02/28/2015
    | Version:  1.0
    |
    | ::CHANGE LOG::
    | 1.0   RMB   Initial method creation.
    |
    */
    public function edmundsVehicleStyles($year, $make, $model) {
        $key = \Config::get('edmundsAPI.key');
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.edmunds.com/api/vehicle/v2/'.$make.'/'.$model.'/'.$year.'/styles?fmt=json&api_key='.$key);
        return $response->json();
    }

    /*
    |
    | Common Facade::edmundsVehicleByVIN method
    |
    | Use:    Get from the Edmunds API the vehicle information
    |         based on the vehicle's VIN number provided.
    |
    | Params: vin (string,17)
    | Retrun: JSON object
    |
    | Author:   Robert Binetti
    | Date:     02/28/2015
    | Version:  1.0
    |
    | ::CHANGE LOG::
    | 1.0   RMB   Initial method creation.
    |
    */
    public function edmundsVehicleByVIN($vin) {
        $key = \Config::get('edmundsAPI.key');
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.edmunds.com/api/vehicle/v2/vins/'.$vin.'?fmt=json&api_key='.$key);
        return $response->json();
    }
}
