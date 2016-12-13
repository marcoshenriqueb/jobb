<?php

namespace App\Http\Controllers;

use App\Types as Type;
use App\Category as Category;
use App\City as City;
use App\Job as Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobPost as StoreJobPost;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        $cities = City::all();
        return view('job.create', ['types'=>$types,'categories'=>$categories,'cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobPost $request)
    {
        $job = new Job;
        $job->title = $request->title;
        $job->type_id = $request->type;
        $job->category_id = $request->category;
        $job->summary = $request->summary;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->city_id = $request->city;
        $job->url = $request->url;
        $job->email = $request->email;
        $job->save();
        $request->session()->flash('jobPost', 'The Job was posted successfully!');
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::where('id', '=', $id)->first();
        return view('job.show', ['job'=>$job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
