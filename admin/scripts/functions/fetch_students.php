<?php
require '../../config/db.php';
include 'functions_students.php';

if(isset($_POST["student_id"]))
{
  $output = array();
  $statement = $conn->prepare("SELECT * FROM students WHERE student_number = '".$_POST["student_id"]."' LIMIT 1");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["first_name"] = $row["first_name"];
    $output["middle_name"] = $row["middle_name"];
    $output["last_name"] = $row["last_name"];
    $output["school_grade"] = $row["school_grade"];
    $output["club_assigned"] = $row["club_assigned"];
  }
 echo json_encode($output);
}
?>