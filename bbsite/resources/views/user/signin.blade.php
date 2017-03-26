@extends('layouts.master')
@section('content')
   <div class="panel panel-primary">
   	  <div class="panel-heading text-center">{{ trans('app.Signin') }}</div>

   	  @include('partials.flash')

   	  <div class="panel-body">
   	  	<form action="{{route('user.signin')}}" class="form-horizontal" id="form-signin" role="form" method="POST">

   	  	   <p class="errorlogin" style="color:red;display:none"></p>
   	  		{{csrf_field()}}

   	  		<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
   	  			<label for="email" class="col-md-4 control-label">{{ trans('app.Email') }}</label>
   	  			<div class="col-md-6">
   	  				<input id="email" type="text" name="email" class="form-control" value="{{old('email')}}">
   	  				@if($errors->has('email'))
                       <span class="help-block">
                       	  <strong style="color:red;">{{$errors->first('email')}}</strong>
                       </span>
   	  				@endif
   	  			</div>
   	  		</div>

   	  		<div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
   	  			<label for="password" class="col-md-4 control-label">{{ trans('app.Password') }}</label>
   	  			<div class="col-md-6">
   	  				<input id="password" type="password" name="password" class="form-control" value="">
   	  				@if($errors->has('password'))
                       <span class="help-block">
                       	  <strong style="color:red;">{{$errors->first('password')}}</strong>
                       </span>
   	  				@endif
   	  			</div>
   	  		</div>

   	  		

   	  		<div class="form-group">
   	  			<div class="col-md-6 col-md-offset-4">
   	  				<button class="btn btn-primary" type="submit">{{ trans('app.Signin') }}</button>
   	  				<button class="btn btn-primary" type="reset">{{ trans('app.Reset') }}</button>
              <a href="{{ url('/user/google/redirect') }}" class="btn btn-success">Google</a>
              <a href="{{ url('/user/facebook/redirect') }}" class="btn btn-success">Facebook</a>
              <a href="{{ url('/user/twitter/redirect') }}" class="btn btn-success">Twitter</a>
   	  			</div>
   	  		</div>

   	  	</form>
   	  </div>
   </div>
@endsection