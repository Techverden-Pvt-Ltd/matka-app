<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Market;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class MarketController extends Controller
{
    public function index()
    {
        return view('market.index', ['markets' => Market::active()->get()]);
    }

    public function add()
    {
        return view('market.addUpdateForm', ['action' => route('market.insert')]);
    }

    public function insert(Request $request)
    {
        try
        {
            $result = Market::insert([
                'name' => $request->name,
                'opening_time' => Carbon::parse($request->opening_time),
                'closing_time' => Carbon::parse($request->closing_time)
            ]);

            if($result)
            {
                return redirect()->route('market.index')->with('success', 'Market added successfully');                
            }

            return redirect()->back()->with('error', 'Unable to add market');
        }
        catch(Exception $e)
        {
            Log::info("insert:MarketController.php exception");
            Log::error($e);
            return redirect()->back()->with('error', 'Unknown server error');
        }
    }

    public function edit($id)
    {
        return view('market.addUpdateForm', [
            'action' => route('market.update'),
            'market' => Market::find($id)
        ]);
    }

    public function update(Request $request)
    {
        try
        {
            $result = Market::find($request->id)->update([
                'name' => $request->name,
                'opening_time' => Carbon::parse($request->opening_time),
                'closing_time' => Carbon::parse($request->closing_time)
            ]);

            if($result)
            {
                return redirect()->route('market.index')->with('success', 'Market updated successfully');                
            }

            return redirect()->back()->with('error', 'Unable to update market');
        }
        catch(Exception $e)
        {
            Log::info("update:MarketController.php exception");
            Log::error($e);
            return redirect()->back()->with('error', 'Unknown server error');
        }
    }

    public function delete($id)
    {
        try
        {
            $result = Market::find($id)->update([
                'status' => 0
            ]);

            if($result)
            {
                return redirect()->route('market.index')->with('success', 'Market deleted successfully');                
            }

            return redirect()->back()->with('error', 'Unable to delete market');
        }
        catch(Exception $e)
        {
            Log::info("delete:MarketController.php exception");
            Log::error($e);
            return redirect()->back()->with('error', 'Unknown server error');
        }
    }
}
