<?php


function get_total_all_records()
{
	include '../../config/db.php';
	$stmt = $conn->prepare("SELECT * FROM users");
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $stmt->rowCount();
}

?>