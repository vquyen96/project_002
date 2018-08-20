<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getHome(){
    	return view('client.index.index');
    }
    public function getTest(){
    	return view('client.test');
    }
}
