@extends('layouts.app')

@section('title', 'Main page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    @if(Session::has('jobPost'))
      <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
          <div class="alert alert-success">
            {{Session::get('jobPost')}}
          </div>
        </div>
      </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <h1>
                    Welcome in INSPINIA Laravel Starter Project
                </h1>
                <small>
                    It is an application skeleton for a typical web app. You can use it to quickly bootstrap your webapp projects.
                </small>
            </div>
        </div>
    </div>
  </div>
@endsection
