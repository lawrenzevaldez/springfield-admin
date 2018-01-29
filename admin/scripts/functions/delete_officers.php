<?php
require '../../config/db.php';
include 'functions_officers.php';

if(isset($_POST["officer_id"]))
{
    $statement = $conn->prepare("DELETE FROM officers WHERE o_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["officer_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Officer Removed';
    }
}

?>