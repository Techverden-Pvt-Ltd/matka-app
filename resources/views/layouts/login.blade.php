<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.pn')}}g">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Matka - @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <style type="text/css">
    body {
      overflow: hidden;
    }
    .main-panel {
      position: unset;
      float: unset;
      width: 100%;
      height: 100%;
      min-height: 1000px;
    }

    .mt-30 {
      margin-top: 30px;
    }
  </style>
  @yield('styles')
</head>
<body class="">
  <div class="main-panel">
    @yield('content')
  </div>
  <script src="{{asset('js/core/jquery.min.js')}}"></script>
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
  <script src="{{asset('js/paper-dashboard.js')}}?v=2.0.1"></script>
  @yield('scripts')
</body>
</html>