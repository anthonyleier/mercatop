<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AppController extends Controller
{
    function logout(){
    	Auth::logout();
		return redirect('/login');
    }

    function listarUsers(){
    	$lista = User::all();
    	return view('user.listarUsers', ["lista" => $lista]);
    }
}
