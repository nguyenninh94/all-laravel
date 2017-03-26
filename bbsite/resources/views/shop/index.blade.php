@extends('layouts.master')
@section('title')
   Laravel Shopping Cart
@endsection

@section('content')
   @if(Session::has('success'))
    <div class="row"> 
      <div class="col-sm-6 col-md-4 col-md-offset-4">
      	<div id="charge-message" class="alert alert-success">
          {{Session::get('success')}}
      	</div>
      </div>
     </div> 
   @endif
   
   @foreach($products->chunk(3) as $productchunk)
   <div class="row">
     @foreach($productchunk as $product)
   	  <div class="col-sm-6 col-md-4">
   	  	<div class="thumbnail">
   	  		<img src="{{$product->imagePath}}" alt="..." class="img-responsive" style="height: 150px;width: 100px;">
            <div class="caption">
            	<h3 style="color:red;font-weight: bold;">{{$product->title}}</h3>
            	<p class="description">{{$product->description}}</p>
            	<div class="clearfix">
            		<div class="pull-right price">$ {{$product->price}}</div>
            		<a href="{{route('product.addToCart', $product->id)}}" class="btn btn-primary">
                        Add to cart
            		</a>
            	</div>
            </div>
   	  	</div>
   	  </div>
   	  @endforeach
   </div>
   @endforeach
@endsection