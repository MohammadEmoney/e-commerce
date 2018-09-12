<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Online Shop</title>

<!-- Bootstrap core CSS -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('css/4-col-portfolio.css') }}" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('media.ico')}}" />

<link href="{{asset('common-css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('common-css/ionicons.css')}}" rel="stylesheet">


    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <style type="text/css" media="screen">
        body{
            background-image:  linear-gradient(#004092, #020202, transparent), url('{{asset("bg-2.jpg")}}');
            background-repeat: no-repeat;
            -webkit-background-size: cover;
             -moz-background-size: cover;
             background-size: cover;
             -o-background-size: cover;
        }
    </style>
</head>

<body>
@include('layouts.partial.nav2')
<div class="container">
     <div class="jumbotron bg-transparent">
          <h1 class="display-4">Hello, world!</h1>
          <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <hr class="my-4">
          <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
</div>
   
  
<div class="fixed-bottom">
    @include('layouts.partial.footer')
</div>

@include('layouts.partial.footer-script')

</body>
</html>