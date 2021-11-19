<?php 
    include "dbpdo.php";
    $conn = dbConnect();

 
?>

<html>
 <head>
  <title>Final List</title>
 </head>
 <body>
  <h1>View List</h1>
     <hr>
 <?php
     $name;
     $name = "steve";

     echo $name;
     printStaff($conn)."<br><br>";

   
     $query = "SELECT * FROM staff";
     foreach ($conn->query($query) as $row) {
       print "sid: " .$row['sid'] ."<br>";
       print "Fname: " .$row['fname']. "<br>";
       print "Lname: " .$row['lname']. "<br>";
       print "Email: " .$row['email']. "<br>";
       print "Password: " .$row['password']. "<br>";
       print "Sadmin: " .$row['sadmin']. "<br>";
       print "<br>";
     }
    
?>
    


 </body>
</html>
