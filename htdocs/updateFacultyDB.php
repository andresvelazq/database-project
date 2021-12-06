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
        //echo $_POST['updateBtn'.$index];
        $stmt = NULL;
      
        // function to update DB.
      
        if(empty($fname) || empty($lname) || empty($email) || empty($password) ){
          header("Location: staffFacultyDB.php");//no update if fields all/some are empty
          exit();      
      }
        $update = "UPDATE professors SET fname = '$fname', lname= '$lname', email= '$email', password= '$password' WHERE id = '$index'";
        $delete = "DELETE FROM professors WHERE id = '$index'";
        
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
       header("Location: staffFacultyDB.php");//stays at staffpage after updates
       exit();

    
    ?>
  </body>
</html>
