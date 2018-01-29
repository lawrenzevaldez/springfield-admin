<?php

require '../../config/db.php';
include 'functions_students.php';

$query = '';
$output = array();
$query .= "SELECT * FROM students ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE student_number LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR first_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR middle_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR school_grade LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR club_assigned LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY student_number DESC ';
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
	$sub_array[] = $row["student_number"];
 	$sub_array[] = $row["first_name"];
 	$sub_array[] = $row["middle_name"];
 	$sub_array[] = $row["last_name"];
 	$sub_array[] = $row["school_grade"];
 	$sub_array[] = $row["club_assigned"];
 	$sub_array[] = '<button type="button" name="update" id="'.$row["student_number"].'" class="btn btn-warning btn-xs update">Update</button>'. ' | ' .'<button type="button" name="delete" id="'.$row["student_number"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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