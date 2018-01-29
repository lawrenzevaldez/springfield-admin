<?php

require '../../config/db.php';
include 'functions_officers.php';

$query = '';
$output = array();
$query .= "SELECT * FROM officers ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE full_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR club_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR club_position LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY o_id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
$ctr = 1;

foreach ($result as $row) 
{
	$sub_array = array();
	$sub_array[] = $ctr;
 	$sub_array[] = $row["full_name"];
 	$sub_array[] = $row["club_name"];
 	$sub_array[] = $row["club_position"];
 	$sub_array[] = '<button type="button" name="update" id="'.$row["o_id"].'" class="btn btn-warning btn-xs update">Update</button>'. ' | ' .'<button type="button" name="delete" id="'.$row["o_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 	$data[] = $sub_array;
 	$ctr++;
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);

echo json_encode($output);
?>