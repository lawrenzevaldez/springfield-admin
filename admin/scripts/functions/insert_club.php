<?php
require '../../config/db.php';
include 'functions.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO clubs (club_name, club_info, club_president) VALUES (:club_name, :club_info, :club_president)");
      $result = $statement->execute(
        array(
          ':club_name' => $_POST["clubname"],
          ':club_info' => $_POST["clubinfo"],
          ':club_president'  => "No one assigned yet."
        )
      );
      if(!empty($result))
      {
        echo 'Data Inserted';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE clubs SET club_name = :club_name, club_info = :club_info, club_president = :club_president WHERE c_id = :id");
        $result = $statement->execute(
          array(
            ':club_name' => $_POST["clubname"],
            ':club_info' => $_POST["clubinfo"],
            ':club_president'  => "No one assigned yet.",
            ':id'   => $_POST["club_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Data Updated';
        }
      }
    }

?>