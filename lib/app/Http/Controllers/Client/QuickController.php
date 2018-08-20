<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use DB;
use Auth;
class QuickController extends Controller
{
    public function postDeposit(Request $request ){
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	$data['balance'] = $acc->balance + $request->amount;
    	
    	if(!$acc->update($data))$check = 0;
    	unset($data);
    	$data = [
    		'amount' => $request->amount,
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'type' => 1,
    		'status' => 1
    	];
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

    public function postWithdraw(Request $request ){

    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	if ($acc->balance - $request->amount < 0) {
    		DB::rollBack();
    		dd('looix');
    		return back()->with('error','Lỗi');
    	}
    	
    	$data['balance'] = $acc->balance - $request->amount;
    	if(!$acc->update($data))$check = 0;
    	unset($data);
    	$data = [
    		'amount' => $request->amount,
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'type' => 2,
    		'status' => 1
    	];
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
