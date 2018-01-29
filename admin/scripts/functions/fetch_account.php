<?php
require '../../config/db.php';
include 'functions_account.php';

if(isset($_POST["account_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM users WHERE user_id = '".$_POST["account_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["username"] = $row["user_name"];
  }
 echo json_encode($output);
}
?>