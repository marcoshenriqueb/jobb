@extends('layouts.app')

@section('title', 'Main page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
        <form action="{{route('admin.postLogin')}}" method="post">
          {{ csrf_field() }}
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Admin Login</h5>
            </div>
            <div class="ibox-content">
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label class="control-label" for="email">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label" for="password">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="col-lg-12">
                  <button type="submit" class="btn btn-block btn-primary">Login</button>
                  @if (count($errors) > 0)
                      @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">
                        {{ $error }}
                      </div>
                      @endforeach
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
