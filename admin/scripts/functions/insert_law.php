<?php
require '../../config/db.php';
include 'functions_law.php';

if(isset($_POST["operation"]))
{
  if($_POST["operation"] == "Add")
    {
      $statement = $conn->prepare("INSERT INTO laws (laws) VALUES (:laws)");
      $result = $statement->execute(
        array(
          ':laws' => $_POST["lawname"]
        )
      );
      if(!empty($result))
      {
        echo 'Rules & Regulation Added';
      }
    }
    if($_POST["operation"] == "Edit")
      {
        $statement = $conn->prepare("UPDATE laws SET laws = :laws WHERE l_id = :id");
        $result = $statement->execute(
          array(
            ':laws' => $_POST["lawname"],
            ':id'   => $_POST["law_id"]
          )
        );
        if(!empty($result))
        {
          echo 'Rules & Regulation Info Updated';
        }
      }
    }

?>