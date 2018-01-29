<?php
require '../../config/db.php';
include 'functions_officers.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO officers (full_name, club_name, club_position) VALUES (:full_name, :club_name, :club_position)");
      $result = $statement->execute(
        array(
          ':full_name' => $_POST["studentFullname"],
          ':club_name' => $_POST["studentClubhandle"],
          ':club_position' => $_POST["studentClubPosition"]
        )
      );
      if(!empty($result))
      {
        echo 'Officer Appointed';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE officers SET full_name = :full_name, club_name = :club_name, club_position = :club_position WHERE o_id = :id");
        $result = $statement->execute(
          array(
            ':full_name' => $_POST["studentFullname"],
            ':club_name' => $_POST["studentClubhandle"],
            ':club_position' => $_POST["studentClubPosition"],
            ':id'   => $_POST["officer_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Club Officer Updated';
        }
      }
    }

?>