<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Api\ApiBaseController as Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\WalletTransaction;

class WalletController extends Controller
{
    public function getWallet($userId)
    {
        return $this->sendResponse(Wallet::with("transactions")->where("user_id", $userId)->get(), 'success');
    }

    public function withdrawFunds(Request $request)
    {
        $wallet = Wallet::find($request->id);

        if($wallet->balance >= $request->amount)
        {
            $result = WalletTransaction::insert([
                'wallet_id' => $wallet->id,
                'type' => "withdraw",
                'date' => now(),
                'amount' => $request->amount,
                'medium' => $request->medium
            ]);

            if($result)
            {
                $wallet->balance = $wallet->balance - $request->amount;
                if($wallet->save())
                {
                    return $this->sendResponse(true, 'success');
                }

                return $this->sendError("Unable to withdraw money");
            }

            return $this->sendError("Unable to withdraw money");
        }
        else
        {
            return $this->sendError("Insufficiant funds");
        }
    }

    public function addFunds(Request $request)
    {
        $wallet = Wallet::find($request->id);

        $result = WalletTransaction::insert([
                'wallet_id' => $wallet->id,
                'type' => "add",
                'date' => now(),
                'amount' => $request->amount,
                'medium' => $request->medium
            ]);

        if($result)
        {
            $wallet->balance = $wallet->balance + $request->amount;
            if($wallet->save())
            {
                return $this->sendResponse(true, 'success');
            }

            return $this->sendError("Unable to add money");
        }

        return $this->sendError("Unable to add money");
    }
}
