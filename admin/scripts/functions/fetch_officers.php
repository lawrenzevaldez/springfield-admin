<?php
require '../../config/db.php';
include 'functions_officers.php';

if(isset($_POST["officer_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM officers WHERE o_id = '".$_POST["officer_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["full_name"] = $row["full_name"];
    $output["club_name"] = $row["club_name"];
    $output["club_position"] = $row["club_position"];
  }
 echo json_encode($output);
}
?>