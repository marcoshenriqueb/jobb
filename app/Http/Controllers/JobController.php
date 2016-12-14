<?php

namespace App\Http\Controllers;

use App\Types as Type;
use App\Category as Category;
use App\City as City;
use App\Job as Job;
use App\Application;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobPost as StoreJobPost;
use App\Http\Requests\StoreJobApplication;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only('destroy');
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
     * Apply for a job.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply($id)
    {
        return view('job.apply', ['job_id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeApply(StoreJobApplication $request, $id)
    {
        $file = $request->file('cv');
        $file->move(public_path() . '/cv', $file->getClientOriginalName());
        $ap = new Application;
        $ap->ip = $request->ip();
        $ap->job_id = $request->input('job_id');
        $ap->name = $request->input('name');
        $ap->email = $request->input('email');
        $ap->message = $request->input('message');
        $ap->cv = $file->getClientOriginalName();
        $ap->save();
        $request->session()->flash('posted', 'The application was sent!');
        return redirect()->route('job.show', ['id'=>$request->input('job_id')]);
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
    public function destroy(Request $request, $id)
    {
        try {
          $job = Job::find($id);
          $job->delete();
          $request->session()->flash('jobPost', 'The Job was successfully deleted!');
        } catch (Exception $e) {
          $request->session()->flash('jobPost', "Couldn't delete this job.");
        }
        return redirect()->route('main');
    }
}
