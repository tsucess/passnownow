<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getUser() {
        return "First User";
    }
    // url parameter 
    function getUsername($name) {
        return "My name is ".$name;
    }
    // url Home
    function getHome() {
        return view('home');
    }
}
