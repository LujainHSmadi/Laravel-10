<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function registerRequest(){

    }
    public function login(){
        return view('users.login');
    }
}
