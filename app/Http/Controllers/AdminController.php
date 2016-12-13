<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index(){
      return view('admin.main');
    }

    public function login(){
      return view('admin.login');
    }

    public function postLogin(Request $request){
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return redirect()->intended('main');
      }
      return redirect()->back()->withErrors(['Wrong email or password']);
    }
}
