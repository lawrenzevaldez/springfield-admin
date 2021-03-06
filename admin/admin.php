<?php

session_start();
require_once("config/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	
}
else
{
	$login->redirect('index');
}

//Modal Includes
include "modals/modal_account.php";
//


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin - Spring Field | Spring Field</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/sweetalert.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<style type="text/css">
	.td-limit {
    max-width: 70px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
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
				<span>Admin Accounts</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="blank-page">

				<div class="blank-page">
				<button id="add_accounts" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addAccount"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> New Account</button>
				<br>
				<br>

	        	<table class="table table-bordered datatable" id="account_data">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Username</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			  </table>
	        </div>
	        </div>
	       </div>
	
	<!--//faq-->
		<!---->
		<?php
		 include "footer.php";
		?>
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
	<script type="text/javascript" src="scripts/script_account.js"></script>
</body>
</html>

