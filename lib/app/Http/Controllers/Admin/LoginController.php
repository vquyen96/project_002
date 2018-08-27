<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Account;
use Session;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin.login.login');
    }
    public function postLogin(Request $request){
    	$arr = $request->login;

    	
    	if(Auth::attempt($arr, false)){
            switch (Auth::user()->level) {
                case 1:
                    return redirect('admin')->with('succsess','Hello Boss');
                    break;
                case 2:
                    return redirect('admin')->with('succsess','Hello');
                    break;
                case 3:
                    return redirect('user')->with('succsess','Hello');
                    break;
                default:
                    
                    Session::flush();
                    return back();
                    break;
            }
            Auth::logout();
    		return back('');
    	}
    	else{
    		return back()->withInput()->with('error','Tài khoản khặc mật khẩu của bạn không đúng');
    	}
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return back();
    }
    // public function getLockScreen(Request $request){
    //     if ($request->username == null) {
    //         $data['item'] = Account::first();
    //         return view('admin.login.lockscreen' ,$data);
    //     }
    //     $data['item'] = Account::where('username', $request->username)->first();
    //     if ($data['item'] == null) {
    //         $data['item'] = Account::first();
    //         return view('admin.login.lockscreen' ,$data);
    //     }
    //     return view('admin.login.lockscreen' ,$data);
    // }

    // public function postLockScreen(Request $request){
    //     dd($request);
    // }
    public function getRegister(){
        return view('client.login.register');
    }
    public function postRegister(Request $request){
        $data = $request->acc;
        // dd($data);
        $accExist = Account::where('username', $data['username'])->first();
        if ($accExist) {
            return back()->with('error','Tên đăng nhập đã tồn tại');
        }
        $accExist = Account::where('email', $data['email'])->first();
        if ($accExist) {
            return back()->with('error','Email đã tồn tại');
        }
        $accExist = Account::where('id_number', $data['id_number'])->first();
        if ($accExist) {
            return back()->with('error','Số chứng minh đã tồn tại');
        }
        $data['fullname'] = strtoupper($data['fullname']);
        $data['level'] = 2;
        $data['status'] = 1;
        $data['account_number'] = $this->createAccountNumber();
        $data['birthday'] = strtotime($data['birthday']);
        $password = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['level'] = 3;
        $data['gender'] = 3;
        isset($data['img']) ? $image = $data['img'] : '' ;
        if (isset($data['img'])) {
            $data['img'] = saveImage([$image], 200, 'avatar');
        }
        $acc = Account::create($data);
        if(!$acc){
            return back()->with('error','Lỗi thêm tài khoản');
        }
        else{
            $arr = ['username' => $acc->username, 'password' => $password];
            if(Auth::attempt($arr, false)){
                return redirect('user')->with('succsess','Chào mừng bạn đến với TPBank');
            }
            else{
                return back()->withInput()->with('error','Sảy ra lỗi đăng nhập');
            }  
        }
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
