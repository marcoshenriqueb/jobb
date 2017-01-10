<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Pluralizer;

class SimpleRestController extends Controller
{
    private $models = [
        "category"=>\App\Category::class,
        "type"=>\App\Types::class,
        "city"=>\App\City::class,
        "user"=>\App\User::class,
      ];

    public function __construct(){
      $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $mdl)
    {
        if (array_key_exists($mdl, $this->models)) {
          $search = $request->has('search') ? $request->input('search') : null;
          $columns = DB::getSchemaBuilder()->getColumnListing(Pluralizer::plural($mdl, 2));
          $class = $this->models[$mdl];
          $list = $class::where(key($class::$columns), 'LIKE', '%'. $search . '%')
                                    ->orderBy('created_at', 'desc')->get();
          return view('simple.index', ['list'=>$list, 'mdl'=>$mdl, 'columns'=>$columns, 'search'=>$search]);
        }else {
          return redirect()->route('main');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mdl)
    {
        if (array_key_exists($mdl, $this->models)){
          $class = $this->models[$mdl];
          $fields = $class::$columns;
          return view('simple.create', ['mdl'=>$mdl,'fields'=>$fields]);
        }else {
          return redirect()->route('main');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $mdl)
    {
        $class = $this->models[$mdl];
        if (property_exists($class, 'validator')) {
          $this->validate($request, $class::$validator);
        }
        $m = new $class;
        foreach ($class::$columns as $key => $value) {
          $m->{$key} = $request->input($key);
        }
        $m->save();
        $request->session()->flash('posted', 'The Job was posted successfully!');
        return redirect()->route('simple', ['mdl'=>$mdl]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request, $mdl, $id)
    {
        try {
          $class = $this->models[$mdl];
          $m = $class::find($id);
          $m->delete();
          $request->session()->flash('posted', 'The '. $mdl .' was successfully deleted!');
        } catch (Exception $e) {
          $request->session()->flash('jobPost', "Couldn't delete this ". $mdl .".");
        }
        return redirect()->route('simple', ['mdl'=>$mdl]);
    }
}
