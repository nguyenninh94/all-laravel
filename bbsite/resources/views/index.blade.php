<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select dropdown</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="container">
    <div class="row">
   	  <div class="panel panel-primary">
   	    <div class="panel-heading">
   	  	  Select dropdown jquery 
   	  	</div>  
   	    <div class="panel-body">
   	  	  <div class="form-group">
   	  	  	<label for="province">Province</label>
   	  	  	{!! Form::select('province', ['' => 'Select Province'] +$provinces,'', ['class'=> 'form-control', 'id' => 'province', 'style' => 'width:350px;']) !!}
   	  	  </div>
   	  	  <div class="form-group">
   	  	  	<label for="district">District</label>
   	  	  	<select name="district" id="district" class="from-control" style="width:350px;"></select>
   	  	  </div>
   	  	  <div class="form-group">
   	  	  	<label for="ward">Ward</label>
   	  	  	<select name="ward" id="ward" class="from-control" style="width:350px;"></select>
   	  	  </div>
  	    </div>
  	  </div>  
  	<  
   </div>

   <script type="text/javascript">
     $(function() {
      $('#province').change(function() {
      	 var provinceID = $(this).val();

      	 if(provinceID) {
      	 	$.ajax({
      	 		type: 'GET',
      	 		url: 'api/get-district-list/' + provinceID,
      	 		dataType: 'json',
      	 		success: function(data) {
      	 			if(data) {
      	 				$('#district').empty();
      	 				$('#district').append('<option>Select District</option>');
      	 				$.each(data, function(key, value) {
                           $('#district').append('<option value="'+ value.id+ '">'+ value.name+'</option>');
      	 				}) ;     	 			
      	 			} else {
      	 				$('#district').empty();
      	 			}
      	 		}
      	 	});
      	 } else {
      	 	$('#district').empty();
      	 	$('#ward').empty();
      	 }
      });

     $('#district').on('change', function() {
       var districtID = $(this).val();

       if(districtID) {
       	 $.ajax({
            type: 'GET',
            url: 'api/get-ward-list/' + districtID,
            dataType: 'json',
            success: function(data) {
            	if(data) {
            		$('#ward').empty();
            		$('#ward').append('<option>Select Ward</option>');
            		$.each(data, function(key, value) {
            			$('#ward').append('<option value="'+ value.id +'">'+ value.name +'</option>');
            		});
            	} else {
            		$('#ward').empty();
            	}
            }
       	 });
       } else {
       	  $('#ward').empty();
       }
     });
    });
   </script>
	
</body>
</html>