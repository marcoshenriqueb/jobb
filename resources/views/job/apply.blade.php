@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>
              Apply for a Job
          </h2>
          <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Home</a></li>
            <li><a href="{{route('job.show', ['id'=>$job_id])}}">Job Detail</a></li>
            <li class="active"><strong>Apply for a Job</strong></li>
          </ol>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <form action="{{route('job.storeApply',['id'=>$job_id])}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="job_id" value="{{$job_id}}">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Applicants Information</h5>
            </div>
            <div class="ibox-content">
              <div class="row">
                <div class="col-lg-12 form-group @if($errors->first('name')) has-error @endif">
                  <label class="control-label" for="name">Name</label>
                  <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Your full name">
                </div>
                <div class="col-lg-12 form-group @if($errors->first('name')) has-error @endif">
                  <label class="control-label" for="email">Email</label>
                  <input value="{{ old('email') }}" type="email" class="form-control" name="email" placeholder="Your email">
                </div>
                <div class="col-lg-12 form-group @if($errors->first('message')) has-error @endif">
                  <label class="control-label" for="message">Message</label>
                  <textarea name="message" class="form-control" rows="8" cols="40">{{ old('message')}}</textarea>
                </div>
                <div class="col-lg-12">
                  <label class="control-label" for="cv">CV</label>
                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput">
                      <i class="glyphicon glyphicon-file fileinput-exists"></i>
                      <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-default btn-file">
                      <span class="fileinput-new">Select file</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="cv"/>
                    </span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
                <div class="col-lg-4 col-lg-offset-4">
                  <button type="submit" class="btn btn-block btn-primary">Post Job</button>
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
