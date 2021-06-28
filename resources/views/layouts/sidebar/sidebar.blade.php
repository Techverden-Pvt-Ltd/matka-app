<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="javascript:void(0);" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{asset('img/logo-small.png')}}">
      </div>
    </a>
    <a href="javascript:void(0);" class="simple-text logo-normal">
      {{Auth::guard('admin')->user()->name}}
    </a>
  </div>
  <div class="sidebar-wrapper">
    @include('layouts.sidebar.menu')
  </div>
</div>