<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', ['users' => User::active()->get()]);
    }

    public function delete($id)
    {
        try
        {
            $result = User::find($id)->update([
                'status' => 0
            ]);

            if($result)
            {
                return redirect()->route('user.index')->with('success', 'User deleted successfully');                
            }

            return redirect()->back()->with('error', 'Unable to delete user');
        }
        catch(Exception $e)
        {
            Log::info("delete:UserController.php exception");
            Log::error($e);
            return redirect()->back()->with('error', 'Unknown server error');
        }
    }

    public function verify($id)
    {
        try
        {
            $user = User::find($id);
            $user->mobile_verified_at = Carbon::now()->format('Y-m-d H:i:s');

            if($user->save())
            {
                return redirect()->route('user.index')->with('success', 'User verified successfully');                
            }

            return redirect()->back()->with('error', 'Unable to verify user');
        }
        catch(Exception $e)
        {
            Log::info("verify:UserController.php exception");
            Log::error($e);
            return redirect()->back()->with('error', 'Unknown server error');
        }
    }
}
