<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('dashboard.dashboard');
    }
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    
}
