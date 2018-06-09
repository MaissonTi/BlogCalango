<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Clepsidra</title>
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

    <!-- Custom Css -->
    <link href="{{ url('/')}}/css/admin/style.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ url('/')}}/plugins/particlesjs/css/style.css" rel="stylesheet">
    
    @yield('bsb_css')

</head>

<body style="display: flex; justify-content: center; align-items: center;" >
<div id="particles-js"></div>

@yield('body')

 <!-- Jquery Core Js -->
 <script src="{{ url('/')}}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap Core Js -->
 <script src="{{ url('/')}}/plugins/bootstrap/js/bootstrap.js"></script>

 <!-- Select Plugin Js -->
 <script src="{{ url('/')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

 <!-- Waves Effect Plugin Js -->
 <script src="{{ url('/')}}/plugins/node-waves/waves.js"></script>

 <!-- Custom Js -->
 <script src="{{ url('/')}}/js/admin/admin.js"></script>

<!-- Particles JS -->
<script src="{{ url('/')}}/plugins/particlesjs/js/particles.min.js"></script>
<script src="{{ url('/')}}/plugins/particlesjs/js/app.js"></script>



 @yield('bsb_js')

</body>

</html>