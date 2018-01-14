<?php

//Modal Includes
include "modals/modal_event.php";
//


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Blank :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/sweetalert.css" rel="stylesheet"> 
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<style type="text/css">
	.form-horizontal .control-label
	{
		text-align: left;
	}
</style>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="ckeditor/ckeditor.js"></script>
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>



</head>
<body>
<div id="wrapper">

       <?php include "navbar.php"; ?>

		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="dashboard">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Create Event</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="blank-page">
				<a href="events"><button type="button" class="btn btn-primary pull-left">Go Back</button></a>
				<br>
				<br>
				<div class="alert alert-info">
				  <strong>Add Event</strong> Fill in the form below and click "Save" button to add new event.
				</div>

				<form class="form-horizontal" id="addEvent">
				<fieldset>

				<!-- Text input-->
				<div class="form-group" style="margin-bottom: 0px;">
				  <label for="dtp_input2" class="col-md-2 control-label">Date</label> 
				  <div class="col-md-4">
					<div class="input-group date form_date col-md-2" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="16" type="text" name="eventDate" id="eventDate" value="" readonly>
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
				    <input type="hidden" id="dtp_input2" value="" />
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-2 control-label" for="eventTitle">Title</label>  
				  <div class="col-md-5">
				  <input id="eventTitle" name="eventTitle" type="text" placeholder="" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-2 control-label" for="eventTextArea">Description</label>
				  <div class="col-md-4">                     
				    <textarea class="form-control" id="eventTextAreas" name="eventTextAreas" rows="4" cols="150"></textarea>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-2 control-label" for="eventStatus">Status</label>
				  <div class="col-md-4">
				    <select id="eventStatus" name="eventStatus" class="form-control" required="">
				      <option value="1" selected="">Show</option>
				      <option value="0">Hide</option>
				    </select>
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group">
				  <label class="col-md-2 control-label" for="eventSaveBtn"></label>
				  <div class="col-md-8">
				  	<button type="button" class="btn btn-success" name="saveDate" id="saveDate" onclick="insertData()">Save</button>
				    <a href="events" class="btn btn-danger">Cancel</a>
				  </div>
				</div>

				</fieldset>
				</form>





	        </div>
	       </div>
	
	<!--//faq-->
		<!---->
<div class="copy">
            <p></a> </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="js/scripts.js"></script>
	<script src="js/datatables.min.js"> </script>
	<script src="js/ellipsis.js"> </script>
	<script src="js/sweetalert.min.js"> </script>
	<!--//scrolling js-->
	<script type="text/javascript" src="scripts/script_club.js"></script>
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('eventTextAreas');
                CKEDITOR.on('instanceLoaded', function(e) {e.editor.resize(700, 450)} );
            </script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">
    	$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
    	</script>
    	<script type="text/javascript">
 
		  function insertData() 
		  {

		  	var eventDate=$("#eventDate").val();
		    var eventTitle=$("#eventTitle").val();
		    var eventDescription = CKEDITOR.instances['eventTextAreas'].getData()
		    var eventStatus=$("#eventStatus").val();

		    $.ajax({
		    	type: "POST",
		        url: "scripts/functions/insert_event.php",
		        data: {eventDate:eventDate,eventTitle:eventTitle,eventDescription:eventDescription,eventStatus:eventStatus},
		        dataType: "JSON",
		        success: function(data) {
		        	swal("Success", data, "success");
		        	CKEDITOR.instances.eventTextAreas.setData("");
		        },
		        error: function(err) {
		        	swal('Oops...', err ,'error');
		        }
		    });
		}
  </script>
</body>
</html>

