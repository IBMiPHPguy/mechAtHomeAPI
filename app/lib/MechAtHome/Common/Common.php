<?php namespace MechAtHome\Common;

class Common {

    public function getUserInfo()
    {
        // Based on the API token, return back a user object.
        $api_token = \Request::header('X-Auth-Token');
        return \User::where('api_token', '=', $api_token)->first();
    }

}
