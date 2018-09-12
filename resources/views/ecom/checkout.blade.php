@extends('layouts.main')

@section('content')
	<div class="container">
		<br>
		<div>
			<h2><span class="border-top border-bottom border-warning">Che</span>ckout</h2>
		</div>
		<br>

	<div class="row">

		<!-- Customer Details -->
		<div class="col">
		<h3>Billing Details</h3>
		<form action="{{route('Confirmation')}}" method="get">
		  <div class="form-row">
		    <div class="form-group col-md-12">
		      <label for="inputEmail4">Email</label>
		      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" value="{{auth()->user()->email}}" readonly>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="inputName">Name</label>
		      <input type="text" class="form-control" name="name" id="inputText" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">Address</label>
		    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
		  </div>
		  <div class="form-row">
		  <div class="form-group col-md-6">
		      <label for="inputCity">City</label>
		      <input type="text" class="form-control" name="city" id="inputCity" placeholder="City">
		  </div>
		  <div class="form-group col-md-6">
		      <label for="inputName">Province</label>
		      <input type="text" class="form-control" name="province" id="text" placeholder="Province">
		  </div>
		    <div class="form-group col-md-6">
		      <label for="inputCity">Postal Code</label>
		      <input type="text" class="form-control" name="postal_code" id="" >
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputCity">Phone Number</label>
		      <input type="text" class="form-control" name="phone" id="phone_no" >
		    </div>
		  </div>
		<br>
		<h3>Payment Details</h3>
		<br>
		 <div class="form-row">
		  <div class="form-group col-md-12">
		      <label for="inputCard">Name on Card</label>
		      <input type="text" class="form-control" name="card_name" id="inputCard" placeholder="Name">
		  </div>
		  <div class="form-group col-md-12">
		      <label for="inputCard">Credit Card</label>
		      <input type="text" class="form-control" name="credit_card" id="inputCard" placeholder="0000 0000 0000 0000">
		  </div>
		 </div>
		
		  <button type="submit" class="btn btn-success btn-lg btn-block">Complete Order</button>
		</form>
		</div>

		<!-- Order thumbnails -->
		<div class="col">
			<h3>Your Order</h3>
			@foreach(Cart::content() as $item)
			<div class="media">
				<img src="{{Voyager::image($item->model->image)}}" class="thumbnail mr-3" alt="">
				<div class="media-body">
					<h5 class="mt-0">{{$item->model->name}}</h5>
					<ul>
						<li class="text-muted">{!! substr($item->model->body, 0, 20). '...' !!}</li><br>
						<li class="font-weight-bold">${{$item->model->price}}</li>
					</ul>
				</div>
				<div class="media-body">
					<button type="button" class="btn btn-secondary">1</button>
				</div>
			</div>
			@endforeach
			<hr>
			<!-- table -->
			<table class="table">
			 
			  <tbody>
			    <tr>
			      <td>Subtotal</td>
			      <td>${{Cart::subtotal()}}</td>
			    </tr>
			   <!--  <tr>
			      <td>Discount(10 OFF-10%)</td>
			      <td>-$750.00</td>
			    </tr> -->
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
	</div>

	</div>
	
@endsection