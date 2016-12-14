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
      <br>
    @endif
    <div class="ibox">
      <div class="ibox-title">
        <h5>Most recent jobs</h5>
      </div>
      <div class="ibox-content">
        <div class="row m-b-sm m-t-sm">
          <div class="col-md-12">
            <form action="{{route('main')}}" method="get">
              <div class="col-md-4">
                <select class="input-sm form-control" name="category">
                  <option>All</option>
                  @foreach($categories as $category)
                    <option @if($category->id == $cat) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-8">
                <div class="input-group">
                  <input type="text" name="search" class="input-sm form-control" value="{{$search}}" placeholder="Search Jobs!">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-primary">Search</button>
                  </span>
                </div>
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
                    <a href="{{route('job.show', ['id'=>$job->id])}}">{{$job->title}}</a><br>
                    <small><strong>Created:</strong> {{$job->created_at}}</small>
                  </td>
                  <td class="project-completion">
                    <small><strong>Location:</strong> {{$job->city->name}}</small><br>
                    <small><strong>Category:</strong> {{$job->category->name}}</small>
                  </td>
                  <td class="project-completion hidden-xs hidden-sm">
                    <small>{{$job->summary}}</small>
                  </td>
                  <td class="project-actions hidden-xs">
                    <a href="{{route('job.show', ['id'=>$job->id])}}" class="btn btn-white btn-sm">View</a>
                    @if(Auth::check() && Auth::user()->isAdmin())
                      <br><br>
                      <form action="{{route('job.destroy', ['id'=>$job->id])}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    @endif
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
