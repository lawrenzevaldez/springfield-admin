
	$(document).ready(function(){

		$('#add_adviser').click(function()
		{
			$('#addAdviser')[0].reset();
			$('.modal-title').text("Assign Adviser");
			$('#action').val("Add");
			$('#operation').val("Add");
		});

		var dataTable = $('#adviser_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_advisers.php",
				type:"POST"
			},
			"columnDefs":[
			{
				"targets":2,
				render: $.fn.dataTable.render.ellipsis(20)
			},
			],
		});

		$(document).on('submit', '#addAdviser', function(event)
		{
			event.preventDefault();
			var advisername = $('#advisername').val();

			if(advisername != '')
			{
				$.ajax({
					url:"scripts/functions/insert_advisers.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#addAdviser')[0].reset();
    					$('#add_adviser').modal('hide');
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
			var adviser_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_advisers.php",
				method:"POST",
				data:{adviser_id:adviser_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#add_adviser').modal('show');
					$('#advisername').val(data.adviser_name);
					$('#clubassigned').val(data.club_assigned);
					$('.modal-title').val('Edit Club Handled');
					$('#adviser_id').val(adviser_id);
					$('#action').val("Edit");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var adviser_id = $(this).attr("id");
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
					url:"scripts/functions/delete_advisers.php",
					method:"POST",
					data:{adviser_id:adviser_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});