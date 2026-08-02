<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\support\Facades\Auth;

class AdminController extends Controller
{

    public function index(){
        if(Auth::check()){
            $usertype = Auth()->user()->usertype;
            if($usertype == "user"){
                return view('dashboard');
            }else if($usertype == "admin"){
                return view('admin.index');
            }
        }else{
            return redirect()->back();
        }
    }

    public function home(){
        return view('home.index');
    }
// public function login(){
//         return view('auth.login');
//     }
    
}
