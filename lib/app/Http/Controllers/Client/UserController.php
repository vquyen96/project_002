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
    public function getHome(Request $request){

    	if (Auth::check()) {
    		$data = $request->all();
            $from = strtotime(date('Y-m-1 0:0'));
            $to = time();

            if (isset($data['from']) && isset($data['to'])){
                $from = strtotime($data['from']."00:00");
                $to = strtotime($data['to']."23:59");
            }
            $acc = Account::find(Auth::user()->id);
            $acc->birthday = date('d/m/Y',$acc->birthday);
            $history = Transaction::where(function ($query) use ($acc){
                $query->where('sender_id', $acc->id)
                      ->orWhere('receiver_id', $acc->id);
            })->where('created_at','>=',$from)->where('created_at','<=',$to)->orderBy('created_at', 'desc')->get();

            foreach($history as $item){
                if ($item->type == 3 && $item->receiver_id == Auth::user()->id) {
                    $item->messages = $item->sender->fullname.' gửi vào: '.$item->messages;
                }
                if ($item->type == 3 && $item->receiver_id != Auth::user()->id) {
                    $item->messages = 'Gửi cho '.$item->receiver->fullname.': '.$item->messages;
                }
                
            }

            $data = [
                'acc' => $acc,
                'history' => $history,
                'from' => date('d/m/Y',$from),
                'to' => date('d/m/Y',$to),
            ];
            // dd($data['history']);
	    	return view('client.user.index', $data);
    	}
    	else{
    		return redirect('');
	    }	
    }

    public function postChange(Request $request ){
        $acc = Account::find(Auth::user()->id);
        $data = $request->acc;


        $data['birthday'] = strtotime($data['birthday']."00:00");
        if ($data['password'] == null) {
            unset($data['password']);
        }
        else{
            $data['password'] = bcrypt($data['password']);
        }
        $image = $request->file('img');
        if ($request->hasFile('img')) {
            $data['img'] = saveImage([$image], 100, 'avatar');
        }
        // dd($request );
        if(!$acc->update($data)) return back()->with('error', 'Lỗi Sửa tài khoản');
        return back()->with('success', 'Cập nhật thnahf công');
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
    		'messages' => 'Nạp tiền :'.$request->deposit['messages'],
    		'type' => 1,
    		'status' => 1,
            'created_at' => time()
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
    		'messages' => 'Rút tiền :'.$request->withdraw['messages'],
    		'type' => 2,
    		'status' => 1,
            'created_at' => time()
    	];
    	if ($balance_before - $balance_after != $request->withdraw['amount'] ) $check = 0;
    	if(!Transaction::insert($data)) $check = 0;
    	if ($check == 1) {
    		DB::commit();
            $data['created_at'] = date('d/m/Y H:m', $data['created_at']);
    		return back()->with($data);
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
    	$data['balance'] = $acc->balance - $request->transfer['amount'];
        $receiver = Account::where('fullname', strtoupper($request->transfer['fullname']))->where('account_number', $request->transfer['account_number'])->first();

        if(!$receiver) $check = 0;

        $re_balance_before = $receiver->balance;

    	$re['balance'] = $re_balance_before + $request->transfer['amount'];

    	if(!$acc->update($data))$check = 0;
    	$balance_after = $acc->balance;

        if(!$receiver->update($re)) {$check = 0;}
        else{ $re_balance_after = $receiver->balance;}
       

    	unset($data);
    	$data = [
    		'amount' => $request->transfer['amount'],
    		'sender_id' => $acc->id,
    		'receiver_id' => $receiver->id,
    		'sender_balance_before' => $balance_before,
    		'sender_balance_after' => $balance_after,
            'receiver_balance_before' => $re_balance_before,
            'receiver_balance_after' => $re_balance_after,
    		'messages' => $request->transfer['messages'],
    		'type' => 3,
    		'status' => 1,
            'created_at' => time()
    	];
    	if ($balance_before - $balance_after != $request->transfer['amount'] ) $check = 0;
        // if ($re_balance_after - $re_balance_before != $request->transfer['amount'] ) $check = 0;
    	if(!Transaction::insert($data)) $check = 0;
    	if ($check == 1) {
    		DB::commit();
            $data['re_fullname'] = $request->transfer['fullname'];
            $data['re_account_number'] = $request->transfer['account_number'];
            $data['created_at'] = date('d/m/Y H:m', $data['created_at']);

    		return back()->with($data);
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
        $data['receiver_fullname'] = strtoupper(Input::get('fullname_receiver'));
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
