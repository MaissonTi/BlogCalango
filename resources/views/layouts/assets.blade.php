<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Clepsidra</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('/')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ url('/')}}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('/')}}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ url('/')}}/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ url('/')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('/')}}/css/admin/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('/')}}/css/admin/themes/all-themes.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @yield('bsb_css')

</head>

<body class="theme-blue">

 @yield('body')

 <script src="{{ asset('js/app.js') }}" ></script>

 <!-- Jquery Core Js -->
 <script src="{{ url('/')}}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap Core Js -->
 <script src="{{ url('/')}}/plugins/bootstrap/js/bootstrap.js"></script>

 <!-- Select Plugin Js -->
 <script src="{{ url('/')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

 <!-- Slimscroll Plugin Js -->
 <script src="{{ url('/')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

 <!-- Waves Effect Plugin Js -->
 <script src="{{ url('/')}}/plugins/node-waves/waves.js"></script>

 <!-- Jquery CountTo Plugin Js -->
 <script src="{{ url('/')}}/plugins/jquery-countto/jquery.countTo.js"></script>

 <!-- Morris Plugin Js -->
 <script src="{{ url('/')}}/plugins/raphael/raphael.min.js"></script>
 <script src="{{ url('/')}}/plugins/morrisjs/morris.js"></script>

 <!-- SweetAlert Plugin Js -->
 <script src="{{ url('/')}}/plugins/sweetalert/sweetalert.min.js"></script>  

 <!-- ChartJs -->
 <script src="{{ url('/')}}/plugins/chartjs/Chart.bundle.js"></script>

 <!-- Flot Charts Plugin Js 
 <script src="{{ url('/')}}/plugins/flot-charts/jquery.flot.js"></script>
 <script src="{{ url('/')}}/plugins/flot-charts/jquery.flot.resize.js"></script>
 <script src="{{ url('/')}}/plugins/flot-charts/jquery.flot.pie.js"></script>
 <script src="{{ url('/')}}/plugins/flot-charts/jquery.flot.categories.js"></script>
 <script src="{{ url('/')}}/plugins/flot-charts/jquery.flot.time.js"></script>-->

 <!-- Sparkline Chart Plugin Js 
 <script src="{{ url('/')}}/plugins/jquery-sparkline/jquery.sparkline.js"></script>-->

 <!-- Custom Js-->
 <script src="{{ url('/')}}/js/admin/admin.js"></script>
 <!--<script src="{{ url('/')}}/js/admin/pages/index.js"></script> -->

 <!-- Demo Js -->
 <script src="{{ url('/')}}/js/admin/demo.js"></script>

 <script src="{{ url('/')}}/js/admin/demo.js"></script>



 @yield('bsb_js')

</body>

</html>