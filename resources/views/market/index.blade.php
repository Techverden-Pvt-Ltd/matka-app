@extends('layouts.app')

@section('title', 'Markets')

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
          <h5 class="card-title">Markets <a href="{{route('market.add')}}" class="btn btn-primary btn-round"><i class="fa fa-plus"></i></a></h5>
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
                <th>
                  Action
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
                  <td>
                    <a href="{{route('market.edit', ['id' => $row->id])}}" class="btn btn-success btn-round">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="{{route('market.delete', ['id' => $row->id])}}" class="btn btn-danger btn-round">
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