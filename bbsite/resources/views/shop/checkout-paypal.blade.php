@extends('layouts.master')
@section('title')
  Laravel Shopping Cart
@endsection()

@section('content')
   <div class="row">
   	 <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
   	 	<h1 style="color:red;font-weight: bold;">Checkout</h1>
   	 	<h4>Your total: $ {{$total}}</h4>
   	 	<div id="paypal-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
   	 	  {{Session::get('error')}}
   	 	</div>
   	 	
   	 	<form action="{{url('/checkoutpaypal')}}" id="checkout-form" method="POST">
   	 		<div class="row">
   	 			<div class="col-xs-12">
   	 				<div class="form-group">
   	 					<label for="name">Name</label>
   	 					<input type="text" name="name" id="name" class="form-control" required>
   	 				</div>
   	 		    </div>
   	 		    <div class="col-xs-12">		
   	 				<div class="form-group">
   	 					<label for="address">Address</label>
   	 					<input type="text" name="address" id="address" class="form-control" required>
   	 				</div>
   	 			</div>

   	 			{{csrf_field()}}
   	 			<button class="btn btn-success" type="submit" class="button">Buy now</button>
   	 		</div>
   	 	</form>  
   	 </div>
   </div>
@endsection()  
