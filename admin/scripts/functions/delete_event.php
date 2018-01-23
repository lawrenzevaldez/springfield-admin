<?php
require '../../config/db.php';
include 'functions_events.php';

if(isset($_POST["event_id"]))
{
    $statement = $conn->prepare("DELETE FROM events WHERE e_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["event_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Data Deleted';
    }
}

?>