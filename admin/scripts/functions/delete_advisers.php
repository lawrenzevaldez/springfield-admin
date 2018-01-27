<?php
require '../../config/db.php';
include 'functions_advisers.php';

if(isset($_POST["advisers_id"]))
{
    $statement = $conn->prepare("DELETE FROM advisers WHERE a_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["advisers_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Adviser Removed';
    }
}

?>