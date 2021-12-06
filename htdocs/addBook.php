<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
    session_start();
?>

<html>
  <body>
    <?php
        $index = $_POST['index'];
        $bid = $_POST["index"];
        $pid = $_SESSION['id'];
        $cid = $_POST["inCourse".$index];
        $semester = $_POST["inSemesterAdd"];
        $qty = $_POST["inQty".$index];
        $stmt = NULL;

        $add = "INSERT INTO `requests` (`id`, `pid`, `bid`, `cid`, `semester`, `qty`) 
                VALUES (NULL, '$pid', '$bid', '$cid', '$semester', '$qty')";
        
        if(isset($_POST['addBtn'.$index])){
            $stmt = $conn->prepare($add);
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
