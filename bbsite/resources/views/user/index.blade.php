@extends('layouts.master')
@section('title')
   algolia-scout
@endsection

@section('content')
   	<div class="panel panel-primary">

	  <div class="panel-heading">{{ trans('app.UserManage') }}</div>

	  <div class="panel-body">

	    	<form method="GET" action="{{ route('user.algolia.scout') }}">

				<div class="row">

					<div class="col-md-6">

						<div class="form-group">

							<input type="text" name="search" class="form-control" placeholder="Enter User For Search" value="{{ old('search') }}">

						</div>

					</div>

					<div class="col-md-6">

						<div class="form-group">

							<button class="btn btn-success">{{ trans('app.Search') }}</button>

						</div>

					</div>

				</div>

			</form>


			<table class="table table-bordered">

				<thead>

					<th>Id</th>

					<th>{{ trans('app.Name') }}</th>

					<th>{{ trans('app.Email') }}</th>
					<th>{{ trans('app.Created') }}</th>

					<th>{{ trans('app.Updated') }}</th>

				</thead>

				<tbody>

					@if($users->count())

						@foreach($users as $key => $user)

							<tr>

								<td>{{ ++$key }}</td>

								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>

								<td>{{ $user->created_at }}</td>

								<td>{{ $user->updated_at }}</td>

							</tr>

						@endforeach

					@else

						<tr>

							<td colspan="4">{{ trans('app.User') }}</td>

						</tr>

					@endif

				</tbody>

			</table>

	  </div>

	</div>


</div>
@endsection()