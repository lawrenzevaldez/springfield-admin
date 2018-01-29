
	$(document).ready(function(){

		$('#add_accounts').click(function()
		{
			$('#add_account')[0].reset();
			$('.modal-title').text("Add New Admin Account");
			$('#action').val("Add");
			$('#operation').val("Add");
		});

		var dataTable = $('#account_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_account.php",
				type:"POST"
			},
		});

		$(document).on('submit', '#add_account', function(event)
		{
			event.preventDefault();
			var add_accounts = $('#username').val();

			if(add_accounts != '')
			{
				$.ajax({
					url:"scripts/functions/insert_account.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#add_account')[0].reset();
    					$('#addAccount').modal('hide');
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
			var account_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_account.php",
				method:"POST",
				data:{account_id:account_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#addAccount').modal('show');
					$('#username').val(data.username);
					$('#password').val(data.password);
					$('.modal-title').val('Update User Account');
					$('#account_id').val(account_id);
					$('#action').val("Update");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var account_id = $(this).attr("id");
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
					url:"scripts/functions/delete_account.php",
					method:"POST",
					data:{account_id:account_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});