<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
    session_start();
?>

<html>
  <body>
    <?php
        $index = $_POST['index'];
        $bid = $_POST["bid"];
        $pid = $_SESSION['id'];
        $cid = $_POST["inCourseUpdate".$index];
        $semester = $_POST["inSemesterUpdate".$index];
        $qty = $_POST["inQtyUpdate".$index];
        $stmt = NULL;

        $update = "UPDATE requests 
                   SET pid = '$pid', bid = '$bid', cid = '$cid', semester= '$semester', qty = '$qty'
                   WHERE id = '$index'";
        $delete = "DELETE FROM requests WHERE id = '$index'";
        
        if(isset($_POST['deleteBtn'.$index])){
            $stmt = $conn->prepare($delete);
        }else if(isset($_POST['updateBtn'.$index])){
          $stmt = $conn->prepare($update);
        } else {
          print "<h2>Something when wrong.</h2>";
        }

        //execute query
        $stmt->execute();
        
       header("Location: professorBookRequest.php");
       exit();
    ?>
  </body>
</html>
