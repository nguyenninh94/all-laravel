@extends('layouts.master')
@section('title')
  Select2 Ajax 
@endsection()

@section('content')
   <div class="row">
   	 <div class="col-md-4">
   	 	<form action="">
   	 		<div class="form-group">
   	 			<label for="tag_list">Tgas:</label>
   	 			<select id="tag_list" name="tag_list[]" class="form-control" multiple></select>
   	 		</div>
   	 	</form>
   	 </div>
   </div>
@endsection()

@section('scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   <script>
   	  $('#tag_list').select2({
         placeholder: "Choose tags ...",
         minimumInputLength: 2,
         $.ajax({
            url: 'tags/find',
            dataType: 'json',
            data: function(params) {
            	return {
            		q: $.trim('params.term')
            	};
            },
            processResults: function(data) {
            	return {
            		results: data
            	};
            },
            cache: true
        });
      });
   </script>
@endsection()