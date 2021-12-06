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
      
      if(empty($fname) || empty($lname) || empty($email) || empty($password) ){
        $_SESSION['flagBlank'] = 1;
        header("Location: professorCreate.php");//no update if fields all/some are empty
        exit();      
    }      
      $add = "INSERT INTO professors (`fname`, `lname`, `email`, `password`) VALUES ('$fname', '$lname', '$email','$password')";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      $_SESSION['flagCreatProf'] = 1;
      header("Location: index.php");//goes back to index if successful.
      exit();
    ?>
  </body>
</html>
