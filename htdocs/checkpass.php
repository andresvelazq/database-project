<?php
  session_start();
  // Check if passwords are the same.
  function checkpass(){
    if($_SESSION['pass1'] == $_SESSION['pass2'])
      return 1;
    else {
      $_SESSION['flagInvalPass'] = 1;
      return 0;
    }
  }

  // Create session variables.
  $_SESSION['fname'] = $_POST["inFname"];
  $_SESSION['lname'] = $_POST["inLname"];
  $_SESSION['email'] = $_POST["inEmail"];
  $_SESSION['pass1'] = $_POST["inPass1"];
  $_SESSION['pass2'] = $_POST["inPass2"];

  if (checkpass()){
    header("Location: professorNewAdd.php");
    exit();
  }else{
    header("Location: professorCreate.php");
    exit();
  }
?>