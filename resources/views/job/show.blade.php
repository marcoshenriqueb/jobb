@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>
              Job Detail
          </h2>
          <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Home</a></li>
            <li class="active"><strong>Job Detail</strong></li>
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        @if(Session::has('posted'))
          <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
              <div class="alert alert-success">
                {{Session::get('posted')}}
              </div>
            </div>
          </div>
        @endif
        <div class="ibox">
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <div class="m-b-md">
                  <h2>{{$job->title}}</h2>
                </div>
                <dl class="dl-horizontal">
                  <dt>Type:</dt>
                  <dd>
                    <span class="label label-primary">{{$job->type->name}}</span>
                  </dd>
                </dl>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <dl class="dl-horizontal">
                  <dt>Company:</dt>
                  <dd>{{$job->company}}</dd>
                  <dt>Email:</dt>
                  <dd>{{$job->email}}</dd>
                  <dt>URL:</dt>
                  <dd>{{$job->url?$job->url:'NA'}}</dd>
                </dl>
              </div>
              <div class="col-lg-6">
                <dl class="dl-horizontal">
                  <dt>Category:</dt>
                  <dd>{{$job->category->name}}</dd>
                  <dt>City:</dt>
                  <dd>{{$job->city->name}}</dd>
                  <dt>Created at:</dt>
                  <dd>{{$job->created_at}}</dd>
                </dl>
              </div>
              <div class="col-lg-12">
                <dl class="dl-horizontal">
                  <dt>Summary:</dt>
                  <dd>{{$job->summary}}</dd>
                </dl>
              </div>
              <div class="col-lg-12">
                <dl class="dl-horizontal">
                  <dt>Description:</dt>
                  <dd>{{$job->description}}</dd>
                </dl>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <a href="{{route('job.apply', ['id'=>$job->id])}}" class="btn btn-primary btn-lg">Apply</a>
                @if(Auth::check() && Auth::user()->isAdmin())
                  <form class="pull-right" action="{{route('job.destroy', ['id'=>$job->id])}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                  </form>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
