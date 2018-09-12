@extends('layouts.main')

@section('content')
<div class="container">
	<div class="col-md-9 ml-md-auto">
		<!-- Success or Error Messages -->
	<div>
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
	</div>
	@if(Cart::count() >0)
		<h3>{{Cart::count()}} item(s) in Shopping Cart</h3>
		<br>
		<ul class="list-group">
			@foreach(Cart::content() as $item)


			<li>
				<div class="media">
					<a href="{{route('show-page', ['id' => $item->model->id])}}" title=""><img src="{{ Voyager::image($item->model->image) }}" class="thumbnail mr-3" alt=""></a>
					<div class="media-body">
						<a href="{{route('show-page', ['id' => $item->model->id])}}" title=""><h5 class="mt-0">{{$item->model->name}}</h5></a>
						<ul>
							<li class="text-muted">{!! substr($item->model->body, 0, 20). '...' !!}</li><br>
							<li class="font-weight-bold">{{$item->model->price}}</li>
						</ul>
					</div>
					<div class="media-body">
						<ul>
							<li>
								<select class="custom-select custom-select-sm">
								  <option value="1" selected>1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								</select>
							</li>
							<li>
								<form action="{{route('cart.destroy', $item->rowId)}}" method="post">
									@csrf
									{{ method_field('delete')}}
									<button type="submit" class="btn btn-outline-danger">Remove</button>
								</form>
							</li>
						</ul>
						
					</div>
				</div>
			</li>
			<hr>
			@endforeach
		</ul>
		
		<hr>
		<div>
			<!-- table -->
			<table class="table">
			 
			  <tbody>
			    <tr>
			      <td>Subtotal</td>
			      <td>${{Cart::subtotal()}}</td>
			    </tr>
			    <tr>
			      <td>Tax</td>
			      <td>${{Cart::tax()}}</td>
			    </tr>
			    <tr class="font-weight-bold">
			      <td>total</td>
			      <td>${{Cart::total()}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>
		<div>
			<ul>
				<li>
					<a href="{{route('home')}}" title=""><button type="button" class="btn btn-info">Continue Shopping</button></a>
				</li>
				<li>
					<a href="{{route('checkout.index')}}" title=""><button type="button" class="btn btn-success">Proceed to checkout</button></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<br>
@else
	<br>
	<div class="alert alert-warning" role="alert">
	  No Item in Cart!
	</div>
	<div class="m p">
		<a href="{{route('home')}}" title=""><button type="button" class="btn btn-info">Continue Shopping</button></a>
	</div>
	<br>
	
@endif
	<!-- Might Also Like: -->
	<div class="container">
		<div class="card-group">
	     @foreach($mightAlsoLike as $product)
	          <div class="card">
	            <a href="{{ route('show-page', ['id' => $product->id]) }}" title=""><img class="img-thumbnail" src="{{ Voyager::image($product->image) }}" alt="Card image cap" width="350px"></a>
	            <div class="card-body">
	              <h5 class="card-title">{{$product->name}}</h5>
	              <span class="badge badge-primary">${{ $product->price }}</span>
	            </div>
	           </div>  
	    @endforeach
		</div>
	</div>

@endsection