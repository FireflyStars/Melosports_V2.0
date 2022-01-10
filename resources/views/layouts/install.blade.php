<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
   
  <link rel="icon" href="#" type="image/x-icon" />
  
  <title>{{ isset($title) ? $title : 'DreamSports' }}</title>

  @yield('header_scripts')

  <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap.min.css') }}">
   <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/sb-admin.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.min.css') }}">
      <link rel="shortcut icon" href="{{url('public/favicon.ico')}}" type="image/x-icon" />
<style type="text/css">.text-success {
    color: #00d664 !important;.login-content .logo{margin-bottom: 20px !important}.btn-success {
    background-color: #00d664 !important
}
}</style>
  
</head>

<body class="login-screen" style="background: url('public/images/install.jpg');background-position:center;background-repeat: no-repeat;">


  @yield('content')
  
    <script src="{{ url('public/site/js/jquery.min.js') }}"></script>
<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>
    @yield('footer_scripts')
</body>

</html>