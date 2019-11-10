<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
//        if(Auth::check()){
//            echo 'Tem logado';
//        }else{
//            echo "Não tem logado!";
//        }
        //Logar via código
//        $antonio = \App\User::find(1);
//
//        Auth::login($antonio);
//        Auth::loginUsingId(1);

        return view('home');
    }
}
