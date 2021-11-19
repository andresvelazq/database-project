<?php

  function checkpass($pass1, $pass2){
    if($pass1 == $pass2)
      return 1;
    else
      return 0;
  }

  function checkfields(){
    $fname = $_POST['fname'];
    if($fname > 0){
      echo 'fname entered';
      exit();
    }else{
      echo 'fname not entered';
    }

  }
  checkfields();
  $pass1 = $_POST['password1'];
  $pass2 = $_POST['password2'];
  if (checkpass($pass1, $pass2) && checkfields()){
    header("Location: professorCreateSuccess.php");
    exit();
  }else{
    header("Location: professorCreateinvalid.php");
    exit();
  }
?>