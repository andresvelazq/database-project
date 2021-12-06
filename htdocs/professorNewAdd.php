<?php
  session_start();
  include "dbpdo.php";
  $conn = dbConnect(); // connect to DB.
?>

<html>
  <body>
    <?php
      $fname = $_SESSION['fname'];
      $lname = $_SESSION['lname'];
      $email = $_SESSION['email'];
      $password = $_SESSION['pass1'];
      $secret = $_SESSION['secret'];
      
      if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($secret)){
        $_SESSION['flagBlank'] = 1;
        header("Location: professorCreate.php");//no update if fields all/some are empty
        exit();      
    }      
      $add = "INSERT INTO professors (`fname`, `lname`, `email`, `password`, `secret`) VALUES ('$fname', '$lname', '$email','$password', '$secret')";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      $_SESSION['flagCreatProf'] = 1;
      header("Location: index.php");//goes back to index if successful.
      exit();
    ?>
  </body>
</html>
