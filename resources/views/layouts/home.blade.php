<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <style>


        #neonShadow {

            border: none;
            border-radius: 50px;
            transition: 0.3s;
            background-color: #b7b0e7;
            animation: glow 1s infinite;
            transition: 0.5s;
        }

        span:hover {
            transition: 0.3s;
            opacity: 1;
            font-weight: 700;
        }

        #neonShadow:hover {
            transform: translateX(-20px) rotate(30deg);
            border-radius: 5px;
            background-color: #04f5b1;
            transition: 0.5s;
        }

        @keyframes glow {
            0% {
                box-shadow: 5px 5px 20px rgb(93, 52, 168), -5px -5px 20px rgb(93, 52, 168);
            }

            50% {
                box-shadow: 5px 5px 20px rgb(81, 224, 210), -5px -5px 20px rgb(81, 224, 210)
            }
            100% {
                box-shadow: 5px 5px 20px rgb(93, 52, 168), -5px -5px 20px rgb(93, 52, 168)
            }
        }
    </style>

    <style>



        /* Additional styling */

        body {
            font-size: 18px;
            font-family: "Vibur", sans-serif;
            background-color: #010a01;
        }
    </style>
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>کنسرت</title>
    <meta name="keywords" content="کنسرت" >
    <meta name="description" content="کنسرت">
    <meta name="author" content="کنسرت">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/home/images/favicon.png"/>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="/home/css/packages.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/default.css">

</head>
<body class="sticky-menu">
<div id="loader">
    <div class="loader-ring">
        <div class="loader-ring-light"></div>
        <div class="loader-ring-track"></div>
    </div>
</div>
<div class="wrapper">
@include('include.home.header')
    @yield('content')
    @include('include.home.footer')
</div>
<!-- Overlay Search -->
@include('include.home.order')

@include('include.home.search')




<!-- Include jQuery and Scripts -->
<script type="text/javascript" src="/home/js/jquery.min.js"></script>
<script type="text/javascript" src="/home/js/packages.min.js"></script>
<script type="text/javascript" src="/home/js/scripts.min.js"></script>
<!-- jQuery easing plugin -->
</body>
</html>
