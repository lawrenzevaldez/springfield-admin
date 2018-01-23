<?php
require '../../config/db.php';
include 'functions_events.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO events (event_date, event_title, description, status) VALUES (:event_date, :event_title, :description, :status)");
      $result = $statement->execute(
        array(
          ':event_date' => $_POST["eventDate"],
          ':event_title' => $_POST["eventTitle"],
          ':description' => $_POST["eventTextArea"],
          ':status'  => $_POST["eventStatus"]
        )
      );
      if(!empty($result))
      {
        echo 'Data Inserted';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE events SET event_date = :event_date, event_title = :event_title, description = :description, status = :status WHERE e_id = :id");
        $result = $statement->execute(
          array(
            ':event_date' => $_POST["eventDate"],
            ':event_title' => $_POST["eventTitle"],
            ':description'  => $_POST["eventTextArea"],
            ':status'  => $_POST["eventStatus"],
            ':id'   => $_POST["event_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Data Updated';
        }
      }
    }

?>