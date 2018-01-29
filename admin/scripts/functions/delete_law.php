<?php
require '../../config/db.php';
include 'functions_law.php';

if(isset($_POST["law_id"]))
{
    $statement = $conn->prepare("DELETE FROM laws WHERE l_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["law_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Rules & Regulation Deleted';
    }
}

?>