<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Account;
use App\Models\Transaction;
class DepositController extends Controller
{
    public function getDeposit(){
    	return view('admin.deposit.index');
    }
    public function postDeposit(Request $request){
    	$req = $request->deposit;
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::where('fullname', strtoupper($req['fullname']))->where('account_number', $req['account_number'])->first();
    	$balance_before = $acc->balance;
    	$data['balance'] = $acc->balance + $request->deposit['amount'];

    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;
    	unset($data);
    	$data = [
    		'amount' => $req['amount'],
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
    		'messages' => $req['sender_fullname'].' ('.$req['address'].') nộp tiền :'.$req['messages'],
    		'type' => 1,
    		'status' => 1,
            'created_at' => time()
    	];
    	
    	if ($balance_after - $balance_before != $req['amount'] ) $check = 0;

    	if(!Transaction::insert($data)) $check = 0;
    	if ($check == 1) {
    		DB::commit();
    		return back()->with('success','Giao dịch thành công');
    	}
    	else{
    		DB::rollBack();
    		return back()->with('error','Lỗi');
    	}
    	return view('admin.deposit.index');
    }
}
