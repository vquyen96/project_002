<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountAddRequest;
use App\Http\Requests\AccountEditRequest;

use App\Models\Account;

use File;
use Auth;
use DB;
class AccountController extends Controller
{
    public function getList(){

        
        $data['items'] = Account::orderBy('id', 'desc')->get();
    	return view('admin.account.account', $data);
    }
    public function getAdd(){
        
    	return view('admin.account.account_form');
    }
    public function postAdd(AccountAddRequest $request){
    	// $acc = new Account;
        $data = $request->acc;
        $data['level'] = 2;
        $data['status'] = 1;
        $data['account_number'] = $this->createAccountNumber();
        $data['birthday'] = strtotime($data['birthday']);
        $data['password'] = bcrypt($data['password']);
        isset($data['img']) ? $image = $data['img'] : '' ;
        if (isset($data['img'])) {
            $data['img'] = saveImage([$image], 200, 'avatar');
        }
        $acc = Account::create($data);

    	return redirect('admin/account')->with('success','Thêm tài khoản thành công');
    }
    public function getEdit($id){
    	$data['item'] = Account::find($id);


        $data['item']->birthday = date('Y-m-d', $data['item']->birthday );

    	return view('admin.account.account_form', $data);
    }
    public function postEdit(AccountEditRequest $request, $id){

    	$acc = Account::find($id);
    	$data = $request->acc;
        if ($acc->account_number == null) {
            $data['account_number'] = $this->createAccountNumber();
        }
        if ($data['password'] == null) {
            unset($data['password']);
        }
        else{
            $data['password'] = bcrypt($data['password']);
            
        }
        isset($data['birthday']) && $data['birthday'] != null ? $data['birthday'] = strtotime($data['birthday']) : '' ;
        isset($data['img']) ? $image = $data['img'] : '' ;
        if (isset($data['img'])) {
            $data['img'] = saveImage([$image], 200, 'avatar');
        }
        $acc->update($data);

    	return redirect('admin/account')->with('success','Sửa tài khoản thành công');
    }
    public function getDelete($id){
        $acc = Account::find($id);
        $filename = $acc->img;
        File::delete('libs/storage/app/avatar/'.$filename);
        File::delete('libs/storage/app/avatar/resized-'.$filename);
        $acc->delete();
        return back()->with('success', 'Xóa tài khoản thành công');
    }
    function createAccountNumber(){
        $account_number = '';
        $acc = 1;
        while ($acc != null)  {
            for($i = 0 ; $i < 4; $i++){
                $ran = rand(1000,9999);
                $account_number .= $ran;
            }
            $acc = Account::where('account_number', $account_number)->first();
        }
        return $account_number;

            
    }
}
