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
        //echo $_POST['updateBtn'.$index];
        $stmt = NULL;
      
        // function to update DB.
      
        if(empty($sid) ||  empty($fname) || empty($lname) || empty($email) || empty($password) || empty($sadmin) ){
          header("Location: staffManageAcc.php");//no update if fields all/some are empty
          exit();      
      }
        $update = "UPDATE staff SET fname = '$fname', lname= '$lname', email= '$email', password= '$password', sadmin = '$sadmin' WHERE sid = '$index'";
        $delete = "DELETE FROM staff WHERE sid = '$index'";
        
        if(isset($_POST["updateBtn".$index])){
            $stmt = $conn->prepare($update);
        }else if(isset($_POST['deleteBtn'.$index])){
            $stmt = $conn->prepare($delete);
        }else{
            echo "button was not clicked";
        }

        //execute query
        $stmt->execute();
        
        // print staff table.
       // printStaff($conn);
       header("Location: staffManageAcc.php");//stays at staffpage after updates
       exit();

    
    ?>
  </body>
</html>
