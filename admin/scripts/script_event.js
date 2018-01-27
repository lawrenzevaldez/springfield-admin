
	$(document).ready(function(){

		CKEDITOR.replace( 'eventTextArea' );

		$('#new_event').click(function()
		{
			$('#newEvent')[0].reset();
			$('.modal-title').text("New Event");
			$('#action').val("Add");
			CKEDITOR.instances.eventTextArea.setData("");
			$('#operation').val("Add");
		});

		var dataTable = $('#event_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_events.php",
				type:"POST"
			},
			"columnDefs":[
			{
				"targets":3,
				render: $.fn.dataTable.render.ellipsis(20)
			},
			],
		});

		$(document).on('submit', '#newEvent', function(event)
		{
			event.preventDefault();
			var eventTitle = $('#eventTitle').val();

			if(eventTitle != '')
			{
				$.ajax({
					url:"scripts/functions/insert_event.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#newEvent')[0].reset();
    					$('#newEvents').modal('hide');
    					dataTable.ajax.reload();
    				}
				});
			}
			else
			{
				swal('Oops...', "All fields are required." ,'error')
			}
		});

		$(document).on('click', '.view', function(){
			var event_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_events.php",
				method:"POST",
				data:{event_id:event_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#viewEvents').modal('show');
					$('.modal-title').html(data.event_title);
					$('#viewEventDate').html("Date: " +data.event_date);
					$('#viewEventContent').html(data.description);
					if (data.status == 1) {
						$('#viewEventStatus').html("Status: Shown");
					}
					else
					{
						$('#viewEventStatus').html("Status: Hidden");
					}
				}
			});
		});

		$(document).on('click', '.update', function(){
			var event_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_events.php",
				method:"POST",
				data:{event_id:event_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#newEvents').modal('show');
					$('#eventDate').val(data.event_date);
					$('#eventTitle').val(data.event_title);
					CKEDITOR.instances.eventTextArea.setData(data.description);
					$('#eventStatus').val(data.status);
					$('.modal-title').val('Edit Event');
					$('#event_id').val(event_id);
					$('#action').val("Edit");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var event_id = $(this).attr("id");
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
					url:"scripts/functions/delete_event.php",
					method:"POST",
					data:{event_id:event_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});