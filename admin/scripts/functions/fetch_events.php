<?php
require '../../config/db.php';
include 'functions_events.php';

if(isset($_POST["event_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM events WHERE e_id = '".$_POST["event_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["event_date"] = $row["event_date"];
    $output["event_title"] = $row["event_title"];
    $output["description"] = $row["description"];
    $output["status"] = $row["status"];
  }
 echo json_encode($output);
}
?>