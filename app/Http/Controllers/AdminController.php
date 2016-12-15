<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index(){
      return view('admin.main');
    }

    public function login(){
      $users = User::where('admin', '=', true)->get();
      $first = false;
      if (count($users) == 0) {
        $first = true;
        $u = new User;
        $u->username = 'admin';
        $u->email = 'admin@admin.com';
        $u->password = 'admin';
        $u->admin = true;
        $u->save();
      }
      return view('admin.login', ['first'=>$first]);
    }

    public function postLogin(Request $request){
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
          return redirect()->intended('main');
      }
      return redirect()->back()->withErrors(['Wrong email or password']);
    }

    public function logout(){
      Auth::logout();
      return redirect()->intended('main');
    }
}
