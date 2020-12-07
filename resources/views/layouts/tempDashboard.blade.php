<!doctype html>
<html lang="en">


<!-- Mirrored from coderthemes.com/uplon/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Feb 2019 12:11:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jilsoft">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>HISENSE</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('lib/assets/plugins/morris/morris.css')}}">

    <!-- Switchery css -->
    <link href="{{ asset('lib/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('lib/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ asset('lib/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{ asset('lib/assets/js/modernizr.min.js')}}"></script>

     <style>
        #topnav .topbar-main {
         background-color: green;
          }

    .table td, .table th {
    padding: .25rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    text-align: center;
    }
    </style>


</head>

<body>

    @include('layouts.menu')
    @yield('content')


    <!-- jQuery  -->
    <script src="{{ asset('lib/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('lib/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('lib/assets/js/waves.js')}}"></script>
    <script src="{{ asset('lib/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{ asset('lib/assets/plugins/switchery/switchery.min.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('lib/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ asset('lib/assets/plugins/raphael/raphael-min.js')}}"></script>

    <!-- Counter Up  -->
    <script src="{{ asset('lib/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('lib/assets/js/jquery.core.js')}}"></script>
    <script src="{{ asset('lib/assets/js/jquery.app.js')}}"></script>

    <!-- Page specific js -->
    <script src="{{ asset('lib/assets/pages/jquery.dashboard.js')}}"></script>


</body>


</html>
