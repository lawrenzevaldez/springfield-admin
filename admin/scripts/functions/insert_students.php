<?php
require '../../config/db.php';
include 'functions_students.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO students (first_name, middle_name, last_name, school_grade, club_assigned) VALUES (:first_name, :middle_name, :last_name, :school_grade, :club_assigned)");
      $result = $statement->execute(
        array(
          ':first_name' => $_POST["firstName"],
          ':middle_name' => $_POST["middleName"],
          ':last_name' => $_POST["lastName"],
          ':school_grade' => $_POST["schoolGrade"],
          ':club_assigned' => $_POST["clubassigned"]
        )
      );
      if(!empty($result))
      {
        echo 'Student Info Added';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE students SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, school_grade = :school_grade, club_assigned = :club_assigned WHERE student_number = :id");
        $result = $statement->execute(
          array(
            ':first_name' => $_POST["firstName"],
          ':middle_name' => $_POST["middleName"],
          ':last_name' => $_POST["lastName"],
          ':school_grade' => $_POST["schoolGrade"],
          ':club_assigned' => $_POST["clubassigned"],
          ':id'   => $_POST["student_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Student Info Updated';
        }
      }
    }

?>