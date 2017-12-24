
	$(document).ready(function(){

		CKEDITOR.replace('clubinfo');

		$('#add_button').click(function()
		{
			$('#add_club')[0].reset();
			$('.modal-title').text("Add New Club");
			$('#action').val("Add");
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
				"targets":[0, 3, 4],
				"ordertable": false,
			},
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
    					alert(data);
    					$('#add_club')[0].reset();
    					$('#addClub').modal('hide');
    					dataTable.ajax.reload();
    				}
				});
			}
			else
			{
				alert("All fields are required.");
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
					$('.modal-title').val('Edit Club');
					$('#club_id').val(club_id);
					$('#action').val("Edit");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var club_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this data?"))
			{
				$.ajax({
					url:"scripts/functions/delete_club.php",
					method:"POST",
					data:{club_id:club_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;
			} 
		});
	});