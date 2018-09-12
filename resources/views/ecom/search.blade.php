@extends('layouts.main')

@section('content')
<div class="container">
	@if(session()->has('success_message'))
		<div class="alert alert-success" role="alert">
		 {{ session()->get('success_message')}}
		</div>
		@endif

		@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
		  <ul>
		  	@foreach( $errors as $error)
		  	<li>{{$error}}</li>
		  	@endforeach
		  </ul>
		</div>
		@endif
	<h2>Search Results</h2>
	<p><strong> {{$products->count()}} result(s) for '{{ request()->input('query') }}'</strong></p>
	
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col"></th>
	      <th scope="col">Name</th>
	      <th scope="col">Details</th>
	      <th scope="col">Price</th>
	    </tr>
	  </thead>
	  <tbody>
	@foreach($products as $product)
    <tr>
      <th scope="row"><a href="{{ route('show-page', ['id' => $product->id]) }}"><img src="{{ Voyager::image($product->image) }}" class="thumbnail mr-3" alt=""></a></th>
      <td>{{$product->name}}</td>
      <td>{!! str_limit($product->body, 80) !!}</td>
      <td>{{$product->price}}$</td>
    </tr>
    @endforeach
  </tbody>
</table>
	

</div>

@endsection