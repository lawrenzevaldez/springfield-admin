
	$(document).ready(function(){

		$('#add_officer').click(function()
		{
			$('#addOfficer')[0].reset();
			$('.modal-title').text("Assign Officer");
			$('#action').val("Add");
			$('#operation').val("Add");
		});

		var dataTable = $('#officer_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_officers.php",
				type:"POST"
			},
		});

		$(document).on('submit', '#addOfficer', function(event)
		{
			event.preventDefault();
			var studentFullname = $('#studentFullname').val();

			if(studentFullname != '')
			{
				$.ajax({
					url:"scripts/functions/insert_officers.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#addOfficer')[0].reset();
    					$('#addOfficers').modal('hide');
    					dataTable.ajax.reload();
    				}
				});
			}
			else
			{
				swal('Oops...', "All fields are required." ,'error')
			}
		});



		$(document).on('click', '.update', function(){
			var officer_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_officers.php",
				method:"POST",
				data:{officer_id:officer_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#addOfficers').modal('show');
					$('#studentFullname').val(data.full_name);
					$('#studentClubhandle').val(data.club_name);
					$('#studentClubPosition').val(data.club_position);
					$('.modal-title').val('Update Club Officer');
					$('#officer_id').val(officer_id);
					$('#action').val("Update");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var officer_id = $(this).attr("id");
			swal({
			  title: "Are you sure?",
			  text: "Your will not be able to recover this record!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Confirm",
			  closeOnConfirm: false
			},
			function(){
			  $.ajax({
					url:"scripts/functions/delete_officers.php",
					method:"POST",
					data:{officer_id:officer_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});