<?php
require '../../config/db.php';
include 'functions_account.php';

if(isset($_POST["account_id"]))
{
    $statement = $conn->prepare("DELETE FROM users WHERE user_id = :id");
    $result = $statement->execute(
      array(
        ':id'   => $_POST["account_id"]
      )
    );
    if(!empty($result))
    {
      echo 'Account Deleted';
    }
}

?>