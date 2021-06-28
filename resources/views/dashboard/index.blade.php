@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-globe text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Market</p>
                <p class="card-title">{{$totalMarkets}}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-refresh"></i>
            Manage
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-money-coins text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">User</p>
                <p class="card-title">{{$totalUsers}}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-calendar-o"></i>
            Manage
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Markets</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Opening Time
                </th>
                <th>
                  Closing Time
                </th>
              </thead>
              <tbody>
                @forelse($markets as $row)
                  <tr>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->opening_time}}
                  </td>
                  <td>
                    {{$row->closing_time}}
                  </td>
                </tr>
              @empty
              <tr>
                  <td>
                    No Records Available
                  </td>
                  <td></td>
                  <td></td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="fa fa-history"></i> View All
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection