@extends('layouts.app')

@section('title', 'Main page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5 style="text-transform:capitalize;">Create {{$mdl}}</h5>
      </div>
      <div class="ibox-content">
        <form action="{{route('simple.store', ['mdl'=>$mdl])}}" method="post">
          {{ csrf_field() }}
          <div class="row">
            @foreach($fields as $k => $f)
              <div class="form-group col-md-6" @if($errors->first($k)) has-error @endif">
                <label class="control-label" style="text-transform:capitalize;" for="{{$k}}">{{$k}}</label>
                <input value="{{ old($k) }}" type="{{$f}}" class="form-control" name="{{$k}}">
              </div>
            @endforeach
            <div class="col-lg-4 col-lg-offset-4">
              <button type="submit" class="btn btn-block btn-primary">Save</button>
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
        </form>
      </div>
    </div>
  </div>
@endsection
