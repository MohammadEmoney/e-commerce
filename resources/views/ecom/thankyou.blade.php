@extends('layouts.main')

@section('content')
<div class="jumbotron text-center">
  <h1 class="display-4 text-center">Thank You!</h1> <h2 class="text-center">For Your Purchase</h2>
  <p class="lead text-center">A confirm email was sent.</p>
  <hr class="my-4">
  <p class="text-center"></p>
  <a href="{{route('home')}}" title=""><button type="button" class="btn btn-outline-success center" role="button">Home page</button></a>
</div>

@endsection