<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Api\ApiBaseController as Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;

class RegisterController extends ApiBaseController
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        $wallet = Wallet::insert(['user_id' => $user->id, 'balance' => 0.00]);
        $accessToken = $user->createToken('authToken')->accessToken;

        return $this->sendResponse([ 'user' => $user, 'access_token' => $accessToken], 'success');
    }
}
