<?php
require '../../config/db.php';
include 'functions.php';

if(isset($_POST["club_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM clubs WHERE c_id = '".$_POST["club_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["club_name"] = $row["club_name"];
    $output["club_info"] = $row["club_info"];
  }
 echo json_encode($output);
}
?>