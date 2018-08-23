<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function postDeposit(Request $request ){
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	$balance_before = $acc->balance;
    	$data['balance'] = $acc->balance + $request->amount;

    	
    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;
    	unset($data);
    	$data = [
    		'amount' => $request->amount,
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
    		'messages' => $request->messages,
    		'type' => 1,
    		'status' => 1
    	];
    	if ($balance_after - $balance_before != $request->amount ) $check = 0;
    	if(!Transaction::insert($data)) $check = 0;
    	if ($check == 1) {
    		DB::commit();
    		return back()->with('success','Giao dịch thành công');
    	}
    	else{
    		DB::rollBack();
    		return back()->with('error','Lỗi');
    	}
    }
}
