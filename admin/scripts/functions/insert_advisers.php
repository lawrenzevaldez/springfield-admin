<?php
require '../../config/db.php';
include 'functions_advisers.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO advisers (adviser_name, club_assigned) VALUES (:adviser_name, :club_assigned)");
      $result = $statement->execute(
        array(
          ':adviser_name' => $_POST["advisername"],
          ':club_assigned' => $_POST["clubassigned"]
        )
      );
      if(!empty($result))
      {
        echo 'Adviser Appointed';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE advisers SET adviser_name = :adviser_name, club_assigned = :club_assigned WHERE a_id = :id");
        $result = $statement->execute(
          array(
            ':adviser_name' => $_POST["advisername"],
            ':club_assigned' => $_POST["clubassigned"],
            ':id'   => $_POST["adviser_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Club Adviser Updated';
        }
      }
    }

?>