<?php
require '../../config/db.php';
include 'functions_law.php';

if(isset($_POST["law_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM laws WHERE l_id = '".$_POST["law_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["laws"] = $row["laws"];
  }
 echo json_encode($output);
}
?>