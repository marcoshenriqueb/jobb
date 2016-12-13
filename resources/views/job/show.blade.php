@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>
              {{$job->title}}
          </h2>
          <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Home</a></li>
            <li class="active"><strong>{{$job->title}}</strong></li>
          </ol>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        
      </div>
    </div>
  </div>
@endsection
