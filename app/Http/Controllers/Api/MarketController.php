<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Api\ApiBaseController as Controller;
use Illuminate\Http\Request;
use App\Models\Market;

class MarketController extends Controller
{
    public function getMarkets()
    {
        return $this->sendResponse(Market::active()->today()->get(), 'success');
    }
}
