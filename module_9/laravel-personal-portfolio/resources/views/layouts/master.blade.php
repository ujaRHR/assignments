<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield("title")</title>
  
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>

@include("layouts.header")

@yield("content")

@include("layouts.footer")

<!-- JS Files --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script> 
<script src="{{asset('js/retina.min.js')}}"></script> 
<script src="{{asset('js/modernizr.js')}}"></script> 
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>