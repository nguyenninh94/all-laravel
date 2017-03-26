var url = "http://localhost:8000/pr";

//display modal form for edit
$('.modal-open').on('click', function() {
   var pr_id = $(this).val();

   $.get(url + '/' + pr_id, function(data) {
       //success data
       console.log(data);
       $('#pr_id').val(data.id);
       $('#name').val(data.name);
       $('#details').val(data.details);
       $('#btn_save').val("update");

       $('#myModal').modal('show');

   });
});

//dispaly form forn add
 $('#btn_add').click(function() {
    $('#btn_save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
 });

//delete
$('.delete-product').on('click', function() {
   var pr_id = $(this).val();
   $.ajaxSetup({
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   $.ajax({
      type: 'DELETE',
      url: url + '/' + pr_id,
      success: function(data) {
      	console.log(data);
      	$('#pr' + pr_id).remove();
      	toastr.success('Delete Successfully', 'Alert Success', {timeOut:5000});
      },
      error: function(data) {
      	console.log('Error:', data);
      },
      complete: function(data) {
      	window.location.reload(true);
      }
   });
});

//add new or update pr
$('#btn_save').click(function(e) {
   $.ajaxSetup({
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   e.preventDefault();

   var formData = {
   	  name: $('#name').val(),
   	  details: $('#details').val(),
   }

   //determine case is "add" or "update"
   var state = $('#btn_save').val();
   var type = "POST"; // for add
   var pr_id = $('#pr_id').val();
   var my_url = url;

   if(state == "update") {
   	  type = "PUT";
      my_url = url + '/' + pr_id;
   }

   console.log(formData);
   $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function(data) {
      	console.log(data);

      	var pr = '<tr id="pr' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
      	pr += '<td><button class="btn btn-warning btn-detail modal-open" value="' + data.id + '">Edit</button>';
      	pr += '<td><button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
        
        if(state == "add") {
        	$('#prs-list').append(pr);
        	toastr.success('Add Successfully', 'Alert Success', {timeOut:5000});
        } else {
        	$('#pr' + pr_id).replaceWith(pr);
        	toastr.success('Update Successfully', 'Alert Success', {timeOut:5000});
        }

        $('#frmProducts').trigger("reset");
        $('#myModal').modal('hide');
       },
       error: function(data) {
       	console.log('Error:', data);
       }
   });
});