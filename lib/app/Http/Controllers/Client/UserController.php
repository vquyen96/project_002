<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Account;
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

}
