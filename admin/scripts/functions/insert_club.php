<?php
require '../../config/db.php';
include 'functions.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO clubs (club_name, club_info) VALUES (:club_name, :club_info)");
      $result = $statement->execute(
        array(
          ':club_name' => $_POST["clubname"],
          ':club_info' => $_POST["clubinfo"],
        )
      );
      if(!empty($result))
      {
        echo 'Club Added';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE clubs SET club_name = :club_name, club_info = :club_info WHERE c_id = :id");
        $result = $statement->execute(
          array(
            ':club_name' => $_POST["clubname"],
            ':club_info' => $_POST["clubinfo"],
            ':id'   => $_POST["club_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Club Info Updated';
        }
      }
    }

?>