@extends('layouts.app')

@section('title', 'Main page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    @if(Session::has('posted'))
      <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
          <div class="alert alert-success">
            {{Session::get('posted')}}
          </div>
        </div>
      </div>
    @endif
    <br>
    <div class="ibox">
      <div class="ibox-title">
        <h5 style="text-transform:capitalize;">{{$mdl}} list</h5>
      </div>
      <div class="ibox-content">
        <div class="row m-b-sm m-t-sm">
          <div class="col-md-4">
            <a href="{{route('simple.create', ['mdl'=>$mdl])}}" class="btn btn-primary btn-sm btn-block">New {{$mdl}}</a>
          </div>
          <div class="col-md-8">
            <form action="{{route('simple',['mdl'=>$mdl])}}" method="get">
              <div class="col-md-12">
                <div class="input-group">
                  <input type="text" name="search" class="input-sm form-control" value="{{$search}}" placeholder="Search name!">
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
            <thead>
              <tr>
                <?php $pos=0 ?>
                @foreach($columns as $c)
                  @if($pos<5)
                    <th>
                      {{$c}}
                    </th>
                  @endif
                  <?php $pos++ ?>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($list as $l)
                <tr>
                  <?php $pos=0 ?>
                  @foreach($l->getAttributes() as $a)
                    @if($pos<5)
                      <td class="project-status" style="max-width:250px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        <span>{{$a}}</span>
                      </td>
                    @endif
                    <?php $pos++ ?>
                  @endforeach
                  <td class="project-actions hidden-xs">
                      <form action="{{route('simple.destroy', ['mdl'=>$mdl, 'id'=>$l->id])}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
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
