<?php
  function verify($conn, $table, $email, $password){
    $query = "SELECT email, password 
              FROM $table 
              WHERE email = '$email' AND password = '$password'";

    if ($conn->query($query)->rowCount() > 0){
      return 1;
    }
    else{
      print "Email or password incorrect.";
      exit();
    }
  }

  include "dbpdo.php";
  $conn = dbConnect();
?>

<html>
  <body>
    <h1>Login Unsuccessful</h1>
    <hr>
  <?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($_POST["person_type"] == "staff"){
      // print "<br>You are Staff";
      if(verify($conn, 'staff', $email, $password));
        header("Location: staffMenu.php");
      exit();
    }
    else{
      // echo "You are a Professor";
      if(verify($conn, 'professors', $email, $password));
        header("Location: prof_index.php");
      exit();
    }
  ?>
  </body>
</html>

