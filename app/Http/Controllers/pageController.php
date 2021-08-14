<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('admin.dashboard');
        }elseif(Auth::user()->hasRole('user')){
            return view('user.dashboard');
        }
    }
}
