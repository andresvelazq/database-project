<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
?>


<html>
  <body>
    <?php
      $index = $_POST["index"];
      $sid = $_POST["inSID".$index];
      $fname = $_POST["inFname".$index];
      $lname = $_POST["inLname".$index];
      $email = $_POST["inEmail".$index];
      $password = $_POST["inPass".$index];
      $sadmin = $_POST["inSadmin".$index];
      
      $add = "INSERT INTO staff (`sid`, `fname`, `lname`, `email`, `password`, `sadmin`) VALUES ('$sid', '$fname', '$lname', '$email','$password','$sadmin')";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      
      // print staff table.
        printStaff($conn);
              header("Location: staffManageAcc.php");//goes back to staffmenutacc after addition the change is visible 
        exit();
    ?>
  </body>
</html>
