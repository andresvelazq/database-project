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

<table border="1">
  <tr>
    <th>Person 1</th>
    <th>Person 2</th>
    <th>Person 3</th>
  </tr>
  <tr>
    <td>Emil</td>
    <td>Tobias</td>
    <td>Linus</td>
    <td>
  </tr>
  <tr>
    <td>16</td>
    <td>14</td>
    <td>10</td>
  </tr>
</table>


 <?php
     $name;
     $name = "steve";

     //echo $name;
     //printStaff($conn)."<br><br>";

      echo"<br><br>";
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