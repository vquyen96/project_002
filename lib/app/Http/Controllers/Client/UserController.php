<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    public function getHome(){
    	if (Auth::check()) {
    		$data['acc'] = Account::find(Auth::user()->id);
	    	return view('client.user.index', $data);
    	}
    	else{
    		return redirect('');
	    }	
    }
    public function postDeposit(Request $request ){
    	$req = $request->deposit;
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	$balance_before = $acc->balance;
    	$data['balance'] = $acc->balance + $request->deposit['amount'];

    	
    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;
    	unset($data);
    	$data = [
    		'amount' => $request->deposit['amount'],
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
    		'messages' => $request->deposit['messages'],
    		'type' => 1,
    		'status' => 1
    	];
    	if ($balance_after - $balance_before != $request->deposit['amount'] ) $check = 0;
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


    public function postWithDraw(Request $request ){
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	$balance_before = $acc->balance;
    	$data['balance'] = $acc->balance - $request->withdraw['amount'];

    	
    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;
    	unset($data);
    	$data = [
    		'amount' => $request->withdraw['amount'],
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
    		'messages' => $request->withdraw['messages'],
    		'type' => 2,
    		'status' => 1
    	];
    	if ($balance_before - $balance_after != $request->withdraw['amount'] ) $check = 0;
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
    public function postTransfer(Request $request ){
    	DB::beginTransaction();
    	$check = 1;
    	$acc = Account::find(Auth::user()->id);
    	$balance_before = $acc->balance;
    	$data['balance'] = $acc->balance - $request->withdraw['amount'];

    	
    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;
    	unset($data);
    	$data = [
    		'amount' => $request->withdraw['amount'],
    		'sender_id' => $acc->id,
    		'receiver_id' => $acc->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
    		'messages' => $request->withdraw['messages'],
    		'type' => 2,
    		'status' => 1
    	];
    	if ($balance_before - $balance_after != $request->withdraw['amount'] ) $check = 0;
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
    public function getDeposit(){
        $id = Input::get('id');
        $data['amount'] = Input::get('amount');
        $data['messages'] = Input::get('messages');

        $data['acc'] = Account::find($id);
        if (!isset($data['acc'])) {
        	return response('error' , 501);
        }
        $view = View::make('client.user.deposit',$data)->render();
        return response($view, 200);
    }
    public function getWithdraw(){
        $id = Input::get('id');
        $data['amount'] = Input::get('amount');
        $data['messages'] = Input::get('messages');

        $data['acc'] = Account::find($id);
        if (!isset($data['acc'])) {
        	return response('error' , 501);
        }
        $view = View::make('client.user.withdraw',$data)->render();
        return response($view, 200);
    }
    public function getTransfer(){
        $id = Input::get('id');
        $data['amount'] = Input::get('amount');
        $data['receiver_accountnumber'] = Input::get('accountnumber_receiver');
        $data['receiver_fullname'] = Input::get('fullname_receiver');
        $data['messages'] = Input::get('messages');

        $receiver = Account::where('account_number', $data['receiver_accountnumber']);
        if (!$receiver->first()) {
        	$data['error'] = 'Số tài khoản không tồn tại';
        	$view = View::make('client.user.error', $data)->render();
        	return response($view, 201);
        }
        $receiver = $receiver->where('fullname', $data['receiver_fullname'])->first();
        if(!$receiver){
        	$data['error'] = 'Tên tài khoản không đúng';
        	$view = View::make('client.user.error', $data)->render();
        	return response($view, 201);
        }

        $data['acc'] = Account::find($id);
        if (!isset($data['acc'])) {
        	return response('error' , 501);
        }
        $view = View::make('client.user.transfer',$data)->render();
        return response($view, 200);
    }
}
