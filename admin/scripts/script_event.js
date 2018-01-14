
	$(document).ready(function(){

		CKEDITOR.replace( 'eventTextArea' );

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
				"targets":2,
				render: $.fn.dataTable.render.ellipsis(20)
			},
			],
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
					$('#addEvent_Modal').modal('show');
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