<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiBaseController as Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getProfile($id)
    {
    	return $this->sendResponse(User::find($id), 'success');
    }

    public function updateProfile(Request $request)
    {
    	$result = User::find($request->id)->update([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'mobile_number' => $request->mobile_number
    	]);

    	if($result)
    	{
    		return $this->sendResponse($result, 'success');
    	}

    	return $this->sendError("Unable to update profile");
    }
}
