@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>
              Post a new Job
          </h2>
          <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Home</a></li>
            <li class="active"><strong>Post Job</strong></li>
          </ol>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        @if(count($cities)==0)
          <p>
            The admin need to register cities!
          </p>
        @elseif(count($categories)==0)
          <p>
            The admin need to register categories!
          </p>
        @elseif(count($types)==0)
          <p>
            The admin need to register job types!
          </p>
        @else
          <form action="{{route('job.store')}}" method="post">
            {{ csrf_field() }}
            <div class="ibox float-e-margins">
              <div class="ibox-title">
                <h5>Job Details</h5>
              </div>
              <div class="ibox-content">
                <div class="row">
                  <div class="col-lg-12 @if($errors->first('type')) has-error @endif">
                    <label class="control-label">Type of job*</label>
                    <div>
                      @foreach($types as $type)
                        <label class="checkbox-inline">
                          <input @if(old('type')==$type->id) checked @endif type="radio" name="type" value="{{$type->id}}">
                          {{$type->name}}
                        </label>
                      @endforeach
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-5 form-group @if($errors->first('category')) has-error @endif">
                    <label class="control-label" for="city">Job Category*</label>
                    <select class="form-control m-b" name="category">
                      <option>Select one</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 form-group @if($errors->first('title')) has-error @endif">
                    <label class="control-label" for="title">Title*</label>
                    <input value="{{ old('title') }}" type="text" class="form-control" name="title" placeholder="e.g. 'PHP developer'">
                  </div>
                  <div class="col-lg-12 form-group @if($errors->first('summary')) has-error @endif">
                    <label class="control-label" for="summary">Summary</label>
                    <input value="{{ old('summary') }}" type="text" class="form-control" name="summary" placeholder="Optional">
                  </div>
                  <div class="col-md-5 form-group @if($errors->first('city')) has-error @endif">
                    <label class="control-label" for="city">Location*</label>
                    <select class="form-control m-b" name="city">
                      <option>Select one</option>
                      @foreach($cities as $city)
                        <option value="{{$city->id}}" @if(old('city')==$city->id) selected @endif>{{$city->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-12 form-group @if($errors->first('description')) has-error @endif">
                    <label class="control-label" for="description">Description*</label>
                    <textarea name="description" class="form-control" rows="8" cols="40">{{ old('description')}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="ibox float-e-margins">
              <div class="ibox-title">
                <h5>Hiring Company or Person</h5>
              </div>
              <div class="ibox-content">
                <div class="row">
                  <div class="col-lg-12 form-group @if($errors->first('company')) has-error @endif">
                    <label class="control-label" for="company">Name*</label>
                    <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                  </div>
                  <div class="col-lg-12 form-group @if($errors->first('url')) has-error @endif">
                    <label class="control-label" for="url">Website</label>
                    <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                  </div>
                  <div class="col-lg-12 form-group @if($errors->first('email')) has-error @endif">
                    <label class="control-label" for="email">Email*</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
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
        @endif
      </div>
    </div>
  </div>
@endsection
