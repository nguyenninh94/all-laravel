@extends('layouts.master')
@section('content')
   <div class="panel panel-primary">
   	  <div class="panel-heading text-center">{{ trans('app.Signup') }}</div>
   	  <div class="panel-body">
   	  	
   	  	@include('partials.flash')
   	  	<form action="{{url('/user/sign-up')}}" class="form-horizontal" id="form-signup" role="form" method="POST">
   	  		{{csrf_field()}}

   	  		<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
   	  			<label for="name" class="col-md-4 control-label">{{ trans('app.Name') }}</label>
   	  			<div class="col-md-6">
   	  				<input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">
   	  				@if($errors->has('name'))
                       <span class="help-block">
                       	  <strong style="color:red;">{{$errors->first('name')}}</strong>
                       </span>
   	  				@endif
   	  			</div>
   	  		</div>

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
   	  			<label for="password-confirm" class="col-md-4 control-label">{{ trans('app.ConfirmPassword') }}</label>
   	  			<div class="col-md-6">
   	  				<input type="password" class="form-control" name="password_confirmation" id="password-confirm">
   	  			</div>
   	  		</div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
               {!! app('captcha')->display(); !!}
               @if($errors->has('g-recaptcha-response'))
                       <span class="help-block">
                          <strong style="color:red;">{{$errors->first('g-recaptcha-response')}}</strong>
                       </span>
              @endif
            </div>
          </div>


   	  		<div class="form-group">
   	  			<div class="col-md-6 col-md-offset-4">
   	  				<button class="btn btn-primary" type="submit">{{ trans('app.Signup') }}</button>
   	  				<button class="btn btn-primary" type="reset">{{ trans('app.Reset') }}</button>
   	  			</div>
   	  		</div>

   	  	</form>
   	  </div>
   </div>
@endsection()