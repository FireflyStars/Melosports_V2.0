<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>



<body class="page-header-fixed" style="    position: relative;
    width: 100%;
    min-height: auto;
    overflow-y: hidden;
    background: /* top, transparent red */
 linear-gradient( rgba(0, 0, 0, 0.20), rgba(0, 0, 0, 0.20)), /* bottom, image */
 url({{ url('public/images/bg-login.png') }} );
    background-position: center;
    color: #ffffff;
    background-size: cover;">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>


</html>