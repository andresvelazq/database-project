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
      
      if(empty($fname) || empty($lname) || empty($email) || empty($password) ){
        header("Location: staffFacultyDB.php");//no update if fields all/some are empty
        exit();      
    }      
      $add = "INSERT INTO professors (`fname`, `lname`, `email`, `password`) VALUES ('$fname', '$lname', '$email','$password')";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      
      // print staff table.
        printStaff($conn);
              header("Location: staffFacultyDB.php");//goes back to staffmenutacc after addition the change is visible 
        exit();
    ?>
  </body>
</html>
