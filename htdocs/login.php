<?php
  function verify($conn, $table, $email, $password){
    $query = "SELECT id, email, password 
              FROM $table 
              WHERE email = '$email' AND password = '$password'";

    // If a query is found.
    if ($conn->query($query)->rowCount() > 0){

      // Starts the session for the appropriate user.
      $sth = $conn->prepare($query);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      sessionInfo($conn, $result['id'], $table);
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
        // Catch those who need to reset password.
        if ($_SESSION['reset']) header("Location: resetPass.php");
        else header("Location: staffMenu.php");
      exit();
    }
    else{
      // echo "You are a Professor";
      if(verify($conn, 'professors', $email, $password));
        // Catch those who need to reset password.
        if ($_SESSION['reset']) header("Location: resetPass.php");
        else header("Location: professorMenu.php");
      exit();
    }
  ?>
  </body>
</html>

