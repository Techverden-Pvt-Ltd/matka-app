<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Api\ApiBaseController as Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['mobile_number' => $request->mobile_number, 'password' => $request->password, 'status' => 1]))
        {
            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            return $this->sendResponse([ 'user' => Auth::user(), 'access_token' => $accessToken], 'success');
        }

        return $this->sendError("Invalid mobile number or password");
    }

    public function logout()
    {
        Auth::user()->token()->revoke();
        return $this->sendResponse(true, 'success');
    }
}
