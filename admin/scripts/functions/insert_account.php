<?php
require '../../config/db.php';
include 'functions_account.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $statement = $conn->prepare("INSERT INTO users (user_name, user_password) VALUES (:user_name, :user_password)");
      $result = $statement->execute(
        array(
          ':user_name' => $_POST["username"],
          ':user_password' => $hash
        )
      );
      if(!empty($result))
      {
        echo 'Account Added';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $statement = $conn->prepare("UPDATE users SET user_name = :user_name, user_password = :user_password WHERE user_id = :id");
        $result = $statement->execute(
          array(
            ':user_name' => $_POST["username"],
            ':user_password' => $hash,
            ':id'   => $_POST["account_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Account Info Updated';
        }
      }
    }

?>