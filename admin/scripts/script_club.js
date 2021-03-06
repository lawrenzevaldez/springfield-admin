
	$(document).ready(function(){

		CKEDITOR.replace('clubinfo');

		$('#add_button').click(function()
		{
			$('#add_club')[0].reset();
			$('.modal-title').text("Add New Club");
			$('#action').val("Add");
			CKEDITOR.instances.clubinfo.setData("");
			$('#operation').val("Add");
		});

		var dataTable = $('#club_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list.php",
				type:"POST"
			},
			"columnDefs":[
			{
				"targets":2,
				render: $.fn.dataTable.render.ellipsis(20)
			},
			{
				"targets":2,
			}
			],
		});

		$(document).on('submit', '#add_club', function(event)
		{
			event.preventDefault();
			var club_name = $('#clubname').val();

			if(club_name != '')
			{
				$.ajax({
					url:"scripts/functions/insert_club.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#add_club')[0].reset();
    					$('#addClub').modal('hide');
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
			var club_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch.php",
				method:"POST",
				data:{club_id:club_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#addClub').modal('show');
					$('#clubname').val(data.club_name);
					CKEDITOR.instances.clubinfo.setData(data.club_info);
					$('.modal-title').val('Update Club');
					$('#club_id').val(club_id);
					$('#action').val("Update");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var club_id = $(this).attr("id");
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
					url:"scripts/functions/delete_club.php",
					method:"POST",
					data:{club_id:club_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});