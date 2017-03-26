@extends('layouts.master')
@section('content')
   <div class="row">
   	  <div class="panel panel-primary">
   	  	<div class="panel panel-heading text-center">
   	  		{{ trans('app.Profile') }}
   	  	</div>
   	  	<div class="panel panel-body">
   	  		{{ trans('app.Hello') }} {{Auth::user()->name}}
   	  	</div>
   	  </div>
   </div>
@endsection()