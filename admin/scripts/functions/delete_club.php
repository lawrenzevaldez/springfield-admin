<?php
require '../../config/db.php';
include 'functions.php';

if(isset($_POST["club_id"]))
{
    $statement = $conn->prepare("DELETE FROM clubs WHERE c_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["club_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Data Deleted';
    }
}

?>