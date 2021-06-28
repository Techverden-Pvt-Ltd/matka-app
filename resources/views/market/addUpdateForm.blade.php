@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">{{Route::is('market.add') ? 'Add Market' : 'Update Market'}}</h5>
        </div>
        <form method="POST" action="{{$action}}">
          @csrf
          <input type="hidden" name="id" value="{{$market->id ?? ''}}">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$market->name ?? ''}}">
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Opening Time</label>
                  <input type="datetime-local" class="form-control" placeholder="Select Opening Time" name="opening_time" id="opening_time" value="{{isset($market->opening_time) ? formatToYmdhi($market->opening_time) : ''}}">
                  @error('opening_time')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Closing Time</label>
                  <input type="datetime-local" class="form-control" placeholder="Enter Closing Time" name="closing_time" id="closing_time" value="{{isset($market->closing_time) ? formatToYmdhi($market->closing_time) : ''}}">
                  @error('closing_time')
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
                <button type="submit" class="btn btn-primary btn-round">{{Route::is('market.add') ? 'Add' : 'Update'}}</button>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection