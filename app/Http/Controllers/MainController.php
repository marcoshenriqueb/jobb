<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;

class MainController extends Controller
{
    public function index(Request $request){
      $needle = $request->has('search') ? $request->input('search') : null;
      $category = $request->has('category') && $request->input('category') != "All" ? $request->input('category') : null;
      $jobs = Job::searchJobs($needle, $category);
      $categories = Category::all();
      return view('home.index', [
                              'jobs'=>$jobs,
                              'search'=>$needle,
                              'categories'=>$categories,
                              'cat'=>$category
                            ]);
    }
}
