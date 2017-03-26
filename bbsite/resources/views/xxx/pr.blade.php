@extends('layouts.master')
@section('title')
  Crud Ajax
@endsection()

@section('content')
   <div class="panel panel-primary">
   	 <div class="panel-heading">Crud Ajax
   	    <button class="btn btn-default" class="btn_add" id="btn-add pull-right" type="button" data-toggle="modal" data-target="#myModal">Add new pr</button>
   	 </div>
   	 <div class="panel-body">
   	 	<table class="table table-striped">
   	 		<thead>
   	 			<th>Id</th>
   	 			<th>Name</th>
   	 			<th>Details</th>
   	 			<th>Actions</th>
   	 		</thead>
   	 		<tbody class="prs-list" id="prs-list">
   	 			@forelse($prs as $pr)
                   <tr id="pr{{$pr->id}}">
                   	 <td>{{$pr->id}}</td>
                   	 <td>{{$pr->name}}</td>
                   	 <td>{{$pr->details}}</td>
                   	 <td>
                   	 	<button class="btn btn-warning btn-detail modal-open" value="{{$pr->id}}">Edit</button>
                   	 	<button class="btn btn-danger btn-delete delete-product" value="{{$pr->id}}">Delete</button>
                   	 </td>
                   </tr>
   	 			@empty
                   <h3>No Prs</h3>
   	 			@endforelse
   	 		</tbody>
   	 	</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                <div class="form-group error">
                 <label for="inputName" class="col-sm-3 control-label">Name</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                   </div>
                   </div>
                 <div class="form-group">
                 <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
                    </div>
                </div>
           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_save" value="add">Save changes</button>
        <input type="hidden" id="pr_id" name="pr_id" value="0">
      </div>
    </div>
   </div>
  </div>
 </div>
 </div>
 {{csrf_field()}}
@endsection() 

@section('scripts')
  <script src="{{url('/js/ajax.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection() 