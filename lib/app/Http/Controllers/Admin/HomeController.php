<?php

namespace App\Http\Controllers\Admin;

// use App\Model\Group_vn;
// use App\Model\News;
// use App\Models\Video_vn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getHome(){

        return view('admin.index.home');
    }
}
