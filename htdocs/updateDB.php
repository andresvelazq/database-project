<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
?>

<html>
  <body>
    <?php
        $index = $_POST["index"];
        $fname = $_POST["inFname".$index];
        $lname = $_POST["inLname".$index];
        $email = $_POST["inEmail".$index];
        $password = $_POST["inPass".$index];
        $table = $_POST['table'];
        //$sadmin = $_POST["inSadmin".$index];
        //echo $_POST['updateBtn'.$index];
        $stmt = NULL;
      
        // function to update DB.
      
        if(empty($fname) || empty($lname) || empty($email) || empty($password) ){
          if ($table == 'staff')
            header("Location: staffManageStaff.php");//no update if fields all/some are empty
          else header("Location: staffManageFaculty.php");
          exit();      
      }
        $update = "UPDATE $table SET fname = '$fname', lname= '$lname', email= '$email', password= '$password' WHERE id = '$index'";
        $delete = "DELETE FROM $table WHERE id = '$index'";
        
        if(isset($_POST["updateBtn".$index])){
            $stmt = $conn->prepare($update);
        }else if(isset($_POST['deleteBtn'.$index])){
            $stmt = $conn->prepare($delete);
        }else{
            echo "button was not clicked";
        }

        //execute query
        $stmt->execute();
        
       //no update if fields all/some are empty,stays at page after update
       if ($table == 'staff')
        header("Location: staffManageStaff.php");
      else header("Location: staffManageFaculty.php");
      exit();

    
    ?>
  </body>
</html>
