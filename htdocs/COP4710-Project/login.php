<?php
  include "dbpdo.php";
  $conn= dbConnect();
?>



<html>
  <body>
    <h1>Login Successful</h1>
    <hr>
  <?php
    $username = $_POST["username"];
    $query = "SELECT * FROM professors WHERE username = '$username'";
    foreach ($conn->query($query) as $row) {
      print $row['pid'];
      print $row['lname'];
      print $row['username'];
    }

    if ($_POST["person_type"] == "staff")
    print "<br>You are Staff";
    else
      echo "You are a Professor";

    echo "<br> Username: ".$_POST["username"]. "<br>";
    echo "Password: " .$_POST["password"];
  ?>
  </body>
</html>

