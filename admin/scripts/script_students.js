
	$(document).ready(function(){

		$('#add_student').click(function()
		{
			$('#addStudent')[0].reset();
			$('.modal-title').text("Add New Student");
			$('#action').val("Add");
			$('#operation').val("Add");
		});

		var dataTable = $('#student_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"scripts/functions/list_students.php",
				type:"POST"
			},
		});

		$(document).on('submit', '#addStudent', function(event)
		{
			event.preventDefault();
			var studentNumber = $('#studentNumber').val();

			if(studentNumber != '')
			{
				$.ajax({
					url:"scripts/functions/insert_students.php",
					method: "POST",
					data: new FormData(this),
					contentType:false,
    				processData:false,
    				success:function(data)
    				{
    					swal("Success", data, "success");
    					$('#addStudent')[0].reset();
    					$('#addStudents').modal('hide');
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
			var student_id = $(this).attr("id");
			$.ajax({
				url:"scripts/functions/fetch_students.php",
				method:"POST",
				data:{student_id:student_id},
				dataType:"JSON",
				success:function(data)
				{
					$('#addStudents').modal('show');
					$('#firstName').val(data.first_name);
					$('#middleName').val(data.middle_name);
					$('#lastName').val(data.last_name);
					$('#schoolGrade').val(data.school_grade);
					$('#clubassigned').val(data.club_assigned);
					$('.modal-title').val('Update Student Info');
					$('#student_id').val(student_id);
					$('#action').val("Update");
					$('#operation').val("Edit");
				}
			});
		});

		$(document).on('click', '.delete', function(){
			var student_id = $(this).attr("id");
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
					url:"scripts/functions/delete_students.php",
					method:"POST",
					data:{student_id:student_id},
					success:function(data)
					{
	                    swal("Success", data,"success");
	                    dataTable.ajax.reload();
	                }
	            });
			});

		});
	});