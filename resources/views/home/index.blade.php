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
    <br>
    <div class="ibox">
      <div class="ibox-title">
        <h5>Most recent jobs</h5>
      </div>
      <div class="ibox-content">
        <div class="row m-b-sm m-t-sm">
          <div class="col-md-12">
            <form action="{{route('main')}}" method="get">
              <div class="input-group">
                <input type="text" name="search" class="input-sm form-control" value="{{old('search')}}" placeholder="Search Jobs!">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-sm btn-primary">Search</button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="project-list">
          <table class="table table-hover">
            <tbody>
              @foreach($jobs as $job)
                <tr>
                  <td class="project-status">
                    <span class="label label-primary">{{$job->type->name}}</span>
                  </td>
                  <td class="project-title">
                    <a href="#">{{$job->title}}</a><br>
                    <small><strong>Created:</strong> {{$job->created_at}}</small>
                  </td>
                  <td class="project-completion">
                    <small><strong>Location:</strong> {{$job->city->name}}</small><br>
                    <small><strong>Category:</strong> {{$job->category->name}}</small>
                  </td>
                  <td class="project-completion">
                    <small>{{$job->summary}}</small>
                  </td>
                  <td class="project-actions">
                    <a href="#" class="btn btn-white btn-sm">View</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
