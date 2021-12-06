<?php
  // include Database connection search a valid username.
  include "dbpdo.php";
  //include "updateDB.php";
  $conn = dbConnect();
  session_start();
?>

<html>
  <body>
    <title>Temporary Password</title>
    <h2>Temporary Password</h2>
    <?php
      // Grab post variables
      $username = $_POST['username'];
      $secret_question = $_POST['secret_question'];
      $table = $_POST['person_type'];
      $isReset = 1;

      //echo $usename;
      $stmt = NULL;

      // query to select from staff
      $query_username = "SELECT email FROM $table WHERE email = '$username'";
      $query_secret = "SELECT secret FROM $table WHERE secret = '$secret_question'";
      $query_reset_update = "SELECT reset FROM $table WHERE reset = '$isReset'";

      // If a query is found.
      if ($conn->query($query_username )->rowCount() > 0 && $conn->query($query_secret)->rowCount() > 0){

        // Starts the session for the appropriate user.
        $sth = $conn->prepare($query_username );
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        $newPassword = randomPassword();

        // print password to user
        printPassword($username,$newPassword);
        
        // function that sets the new generated password to the username.
        updatePassword($newPassword, $conn, $username, $isReset, $table);

        return 1;
      }
      else{
        print "Username not valid.";
        exit();
      }
    ?>

    <?php
      function updatePassword($newPassword, $conn, $username, $isReset, $table){
      // update database password
        $update = "UPDATE $table SET password= '$newPassword', reset = '$isReset' WHERE email = '$username'";
        $stmt = $conn->prepare($update);
        $stmt->execute();
      }
    ?>

    <?php
      function printPassword($username, $newPassword){
        echo "Hello ".$username." your temporary password is: ".$newPassword;
        echo "<br><br><a href = index.php>Back to login</a><br>";
      }
    ?>
      

    <?php
      // password generator function
      function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890{}[]!@#$%^&*()';
        $pass = array(); 
        $r = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $r); 
            $pass[] = $alphabet[$n];
        }
        $new = implode($pass); // change pass to a string
        return $new;
    }
    ?>
  </body>
</html>