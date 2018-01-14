<?php
require '../../config/db.php';

$eventDate=$_POST['eventDate'];
$eventTitle=$_POST['eventTitle'];
$eventDescription=$_POST['eventDescription'];
$eventStatus=$_POST['eventStatus'];
 
$stmt = $conn->prepare("INSERT INTO events(event_date,event_title,description,status) VALUES(:eventDate, :eventTitle,:eventDescription,:eventStatus)");
 
$stmt->bindparam(':eventDate', $eventDate);
$stmt->bindparam(':eventTitle', $eventTitle);
$stmt->bindparam(':eventDescription', $eventDescription);
$stmt->bindparam(':eventStatus', $eventStatus);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);
}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}
 
 ?>