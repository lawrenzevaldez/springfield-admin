<?php
require '../../config/db.php';
include 'functions_advisers.php';

if(isset($_POST["adviser_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM advisers WHERE a_id = '".$_POST["adviser_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["adviser_name"] = $row["adviser_name"];
    $output["club_assigned"] = $row["club_assigned"];
  }
 echo json_encode($output);
}
?>