<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function logout(){
    	Auth::logout();
		return redirect('/login');
    }

    public function telaListarUsers(){
    	$lista = User::all();
    	return view('user.listarUsers', ["lista" => $lista]);
    }
}