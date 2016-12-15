@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
          <h2>
              Job Applicants
          </h2>
          <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Home</a></li>
            <li><a href="{{route('job.show', ['id'=>$job->id])}}">Job Details</a></li>
            <li class="active"><strong>Job Applicants</strong></li>
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
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
          </div>
        </div>
        <div class="ibox">
          <div class="ibox-title">
            <h5>Job Applicants</h5>
          </div>
          <div class="ibox-content">
            @if(count($job->applicants) > 0)
              <div class="project-list">
                <table class="table table-hover">
                  <tbody>
                    @foreach($job->applicants as $a)
                      <tr>
                        <td class="project-title">
                          <a href="/cv/{{$a->cv}}" target="_blank">{{$a->name}}</a><br>
                          <small><strong>Email:</strong> {{$a->email}}</small>
                        </td>
                        <td class="project-completion hidden-xs hidden-sm">
                          <small>{{$a->message}}</small>
                        </td>
                        <td class="project-title">
                          <a href="/cv/{{$a->cv}}" target="_blank">{{$a->cv}}</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <h5>No applications</h5>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
