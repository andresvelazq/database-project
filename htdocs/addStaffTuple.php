<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
?>


<html>
  <body>
    <?php
      $index = $_POST["index"];
      $id = $_POST["inID".$index];
      $fname = $_POST["inFname".$index];
      $lname = $_POST["inLname".$index];
      $email = $_POST["inEmail".$index];
      $password = $_POST["inPass".$index];
      $sadmin = $_POST["inSadmin".$index];
      $reset = 1;
      
      if(empty($fname) || empty($lname) || empty($email) || empty($password) ){
        header("Location: staffManageStaff.php");//no update if fields all/some are empty
        exit();      
    }      
      $add = "INSERT INTO staff (`fname`, `lname`, `email`, `password`, `sadmin`, `reset`) VALUES ('$fname', '$lname', '$email','$password','$sadmin', $reset)";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      
      // print staff table.
        printStaff($conn);
              header("Location: staffManageStaff.php");//goes back to staffmenutacc after addition the change is visible 
        exit();
    ?>
  </body>
</html>
