<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function signup(){
        return view('signUp');
    }
}
