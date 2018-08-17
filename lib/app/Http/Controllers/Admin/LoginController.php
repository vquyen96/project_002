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
                    return redirect('')->with('succsess','Hello');
                    break;
                
                default:
                    Auth::logout();
                    return back();
                    break;
            }
    		return redirect('admin');
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
    public function getLockScreen(Request $request){
        if ($request->username == null) {
            $data['item'] = Account::first();
            return view('admin.login.lockscreen' ,$data);
        }
        $data['item'] = Account::where('username', $request->username)->first();
        if ($data['item'] == null) {
            $data['item'] = Account::first();
            return view('admin.login.lockscreen' ,$data);
        }
        return view('admin.login.lockscreen' ,$data);
    }

    public function postLockScreen(Request $request){
        dd($request);
    }

}
