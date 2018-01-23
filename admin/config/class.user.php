<?php

require('dbconfig.php');

class USER
{ 

  private $conn;
  
  public function __construct()
  {
    $database = new Database();
    $db = $database->dbConnection();
    $this->conn = $db;
    }
  
  public function runQuery($sql)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt;
  }
  
  public function doLogin($uname,$upass)
  {
    try
    {
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_name=:uname ");
      $stmt->execute(array(':uname'=>$uname));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1)
      {
        if(password_verify($upass, $userRow['user_password']))
        {
          $_SESSION['user_session'] = $userRow['user_id'];
          return true;
        }
        else
        {
          return false;
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  
  public function is_loggedin()
  {
    if(isset($_SESSION['user_session']))
    {
      return true;
    }
  }
  
  public function redirect($url)
  {
    header("Location: $url");
  }
  
  public function doLogout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }
}
?>