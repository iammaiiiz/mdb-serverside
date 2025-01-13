<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function goAdmin(){
        return redirect()->route('admin');
    }
    function admin(){
        return view('admin');
    }
    function login(Request $r){
        if($r->passPhase != 'admin') return redirect()->back();
        Session::put('isAdmin',true);
        return redirect()->route('companies');
    }
    function logout(){
        Session::flush();
        return redirect()->route('admin');
    }
}
