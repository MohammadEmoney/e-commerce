<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.partial.header')
</head>

<body>

    <!-- Navigation -->
    @include('layouts.partial.nav2')

    <!-- Page Content -->
    <div class="container">
    @include('layouts.partial.body')
    @yield('content')
    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('layouts.partial.footer')
    <!-- Bootstrap core JavaScript -->
    @include('layouts.partial.footer-script')

  </body>

</html>
