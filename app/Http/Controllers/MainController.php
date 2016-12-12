<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job as Job;

class MainController extends Controller
{
    public function index(Request $request){
      if ($request->has('search')) {
        $needle = $request->input('search');
        $jobs = Job::where('title', 'LIKE', '%'. $needle . '%')
                    ->orWhere('summary', 'LIKE', '%'. $needle . '%')
                    ->orWhere('description', 'LIKE', '%'. $needle . '%')->get();
      }else {
        $jobs = Job::all();
      }
      return view('home.index', ['jobs'=>$jobs]);
    }
}
