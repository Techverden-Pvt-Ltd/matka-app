<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'username'   => 'required|email', 
            'password' => 'required|min:6'
        ];
        
        $messages = [
            'username.required' => 'Please enter username',
            'username.email' => 'Please enter a valid username',
            'password.required' => 'Please enter password',
            'password.min' => 'Password should be atleast of 6 characters'
        ];

        $this->validate($request, $rules, $messages);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]))
        {
    
            return redirect()->route('dashboard.index');
        }

        return back()->with("error", "Invalid Username or Password");
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}
