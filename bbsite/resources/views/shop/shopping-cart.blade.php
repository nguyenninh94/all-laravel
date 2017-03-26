@extends('layouts.master')
@section('title')
   Laravel Shopping Cart
@endsection()

@section('content')
   @if(Session::has('cart'))
      <div class="row">
      	<div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offser-3">
      		<ul class="list-group">
      		 @foreach($products as $product)
      			<li class="list-group-item">
      				<span class="badge">{{$product['qty']}}</span>
      				<strong>{{$product['item']['title']}}</strong>
      				<span class="label label-success">{{$product['price']}}</span>
      				<div class="btn-group">
      					<button class="btn btn-primary btn-xs dropdown-toggle" type="submit" data-toggle="dropdown"><span class="caret">Action</span></button>
      					<ul class="dropdown-menu">
      						<li><a href="">Reduce all</a></li>
   	      				</ul>	      			
      				</div>
      			</li>
      		 @endforeach	
      		</ul>
      	</div>
      </div>

      <div class="row">
      	 <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offser-3">
      	 	<strong>Total: $ {{$totalPrice}}</strong>
      	 </div>
      </div>

      <div class="row">
      	 <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offser-3">
      	 	<a href="{{route('getStripe')}}" class="btn btn-success">Stripe</a>
            <a href="{{route('checkoutpaypal.index')}}" class="btn btn-success">Paypal</a>
      	 </div>
      </div>
   @else
      <div class="row">
      	 <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offser-3">
      	 	<h2>No Items in Cart</h2>
      	 </div>
      </div>
   @endif
@endsection()