<?php
  session_start();
  include "dbpdo.php";
  $_SESSION['pass1'] = $_POST["inPass1"];
  $_SESSION['pass2'] = $_POST["inPass2"];
  
  $stmt = NULL;

  // Check if passwords are the same.
  function checkpass(){
    if($_SESSION['pass1'] == $_SESSION['pass2']){
      $conn = dbConnect(); // connect to DB.
      $index = $_SESSION['id'];
      $password = $_SESSION['pass1'];
      $table = $_SESSION["table"];
      $secret = $_POST['inSecret'];
      $update = "UPDATE $table SET password= '$password', reset= '0', secret= '$secret' WHERE id = '$index'";
      $stmt = $conn->prepare($update);
      $stmt->execute();

      $_SESSION['flagReset'] = 1;
      return 1;
    }else{
      $_SESSION['flagInvalPass'] = 1;
      return 0;
    }
  }

  if (checkpass()){
    header("Location: index.php");
    exit();
  }else{
    header("Location: resetPass.php");
    exit();
  }
?>