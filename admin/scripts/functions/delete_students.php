<?php
require '../../config/db.php';
include 'functions_students.php';

if(isset($_POST["student_id"]))
{
    $statement = $conn->prepare("DELETE FROM students WHERE student_number = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["student_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Student Info Deleted';
    }
}

?>