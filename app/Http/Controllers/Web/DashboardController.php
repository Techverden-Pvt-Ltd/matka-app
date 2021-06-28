<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalUsers' => User::active()->count(),
            'totalMarkets' => Market::active()->count(),
            'markets' => Market::today()->active()->get(),
        ]);
    }
}
