@extends('layouts.login')

@section('title', 'Admin Login')

@section('content')
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 mt-30">
    <div class="card card-user">
      <div class="image">
        <img src="{{asset('img/login-card-bg.jpg')}}">
      </div>
      <form method="POST" action="{{route('admin.login')}}">
        @csrf
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="{{asset('img/user-default.png')}}">
              <h5 class="title">Admin Login</h5>
            </a>
          </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Username</label>
                  <input type="email" class="form-control" placeholder="Enter Username" name="username">
                  @error('username')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter Password" name="password">
                  @error('password')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer">
          <hr>
          @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span>{{Session::get('error')}}</span>
            </div>
          @endif
          <div class="button-container">
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Login</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>
@endsection