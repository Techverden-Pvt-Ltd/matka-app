@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span>{{Session::get('success')}}</span>
            </div>
          @endif
          <h5 class="card-title">Users</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Mobile Number
                </th>
                <th>
                  Verified
                </th>
                <th>
                  Verified At
                </th>
                <th>
                  Action
                </th>
              </thead>
              <tbody>
                @forelse($users as $row)
                  <tr>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->mobile_number}}
                  </td>
                  <td>
                    {{!empty($row->mobile_verified_at) ? 'Yes' : 'No'}}
                  </td>
                  <td>
                    {{$row->mobile_verified_at}}
                  </td>
                  <td>
                    <a href="{{route('user.verify', ['id' => $row->id])}}" class="btn btn-success btn-round">
                      <i class="fa fa-check"></i>
                    </a>
                    <a href="{{route('user.delete', ['id' => $row->id])}}" class="btn btn-danger btn-round">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @empty
              <tr>
                  <td>
                    No Records Available
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection