<?php
  // include Database connection search a valid username.
  include "dbpdo.php";
  //include "updateDB.php";
  $conn = dbConnect();
?>

<html>
  <body>
    <h2>This searches the database for a valid username and secret answer.</h2>
    <?php
      // Grab post variables
      $username = $_POST['username'];
      //echo $usename;
      $stmt = NULL;

      // query to select from staff
      $query = "SELECT email FROM staff st WHERE st.email = '$username'";

      // If a query is found.
      if ($conn->query($query)->rowCount() > 0){

        // Starts the session for the appropriate user.
        $sth = $conn->prepare($query);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $newPassword = randomPassword();

        // print password to user
        printPassword($username,$newPassword);
        
        // function that sets the new generated password to the username.
        updatePassword($newPassword, $conn, $username);

        return 1;
      }
      else{
        print "Username not valid.";
        exit();
      }
    ?>

    <?php
      function updatePassword($newPassword, $conn, $username){
      // update database password
        $update = "UPDATE staff SET password= '$newPassword' WHERE email = '$username'";
        $stmt = $conn->prepare($update);
        $stmt->execute();
      }
    ?>

    <?php
      function printPassword($username, $newPassword){
        echo "Hello '$username' your temporary password is: '$newPassword'";
      }
    ?>

    <?php
      // password generator function
      function randomPassword() {
        $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890{}[]!@#$%^&*()';
        $pass = array(); 
        $combLen = strlen($comb) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen); 
            $pass[] = $comb[$n];
        }
        $new = implode($pass); // change pass to a string
        return $new;
    }
    ?>
  </body>
</html>