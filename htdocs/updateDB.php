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
      
        // function to update DB.
        $update = "UPDATE staff SET fname = '$fname', lname = '$lname',
                    email = '$email', password = '$password', sadmin = '$sadmin' 
                    WHERE sid = '$index'";

        // prepare statement
        $stmt = $conn->prepare($update);
        //execute query
        $stmt->execute();
        
        // print staff table.
        printStaff($conn);

    
    ?>
  </body>
</html>