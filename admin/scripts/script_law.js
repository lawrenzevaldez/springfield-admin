
	$(document).ready(function(){

		$('#add_laws').click(function()
		{
			$('#add_law')[0].reset();
			$('.modal-title').text("Add New Rules & Regulations");
			$('#action').val("Add");
			$('#operation').val("Add");
		});

		var dataTable = $('#law_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_law.php",
				type:"POST"
			},
			"columnDefs":[
			{
				"targets":1,
				render: $.fn.dataTable.render.ellipsis(25)
			},
			],
		});

		$(document).on('submit', '#add_law', function(event)
		{
			event.preventDefault();
			var lawname = $('#lawname').val();

			if(lawname != '')
			{
				$.ajax({
					url:"scripts/functions/insert_law.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#add_law')[0].reset();
    					$('#addLaw').modal('hide');
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
			var law_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_law.php",
				method:"POST",
				data:{law_id:law_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#addLaw').modal('show');
					$('#lawname').val(data.laws);
					$('.modal-title').val('Update Rules & Regulations');
					$('#law_id').val(law_id);
					$('#action').val("Update");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var law_id = $(this).attr("id");
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
					url:"scripts/functions/delete_law.php",
					method:"POST",
					data:{law_id:law_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});