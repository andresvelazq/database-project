<?php 
  include "dbpdo.php";
  $conn = dbConnect();
  session_start();
?>

<html>
<title>Manage Faculty</title>
<body>
  <h1>Manage Faculty Accounts</h1>
  <hr>   
  <div>
    <table border="3">
    <thead>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Password</th>
      <th bgcolor = #009933>Update</th>
      <th bgcolor = #FF0000 >Delete</th>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM professors";
        foreach ($conn->query($query) as $row) {
        $index = $row['id'];
      ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <form action = "updateDB.php" method = "post">
          <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value ="'.$row['fname'].'"/>'; ?></td>
          <td><?php echo '<input type = "text" name = "inLname'.$index.'" value ="'.$row['lname'].'"/>'; ?></td>
          <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value ="'.$row['email'].'"/>'; ?></td>
          <td><?php echo '<input type = "password" name = "inPass'.$index.'" value ="'.$row['password'].'"/>'; ?></td>
          <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>';?>
          <?php echo '<input type = "hidden" name = "table" value ="professors"/>';?>
          <td><?php echo '<input type="submit" value = "update" name = "updateBtn'.$index.'"/>';?></td>					
          <td><?php echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';?></td>
        </form>
      </tr>

      <?php
        $index++;//last iteration index goes to empty row where user can add 
        }                   
      ?>

      <form action = "addFacultyTuple.php" method = "post"> <!--adding tuple!-->
        <td><?php echo '<input type = "hidden" name ="inID'.$index.'" value ="" />';?></td>                      
        <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value =""/>'; ?></td>
        <td><?php echo '<input type = "text" name = "inLname'.$index.'" value =""/>'; ?></td>
        <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value =""/>'; ?></td>
        <td><?php echo '<input type = "text" name = "inPass'.$index.'" value =""/>'; ?></td>
        <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?> 
        <?php echo '<input type = "hidden" name = "table" value ="professors"/>';?>
        <td><?php echo '<input type="submit" value = "Add"name = "addBtn'.$index.'"/></td>';
        $index++;//after add increment to create new emply tuple ?>
      </form>


      </td>                
    </tbody>
    </table>
  </div> 
  <hr>

  <a href = "staffMenu.php">
  <button>Back</button>
</body>
</html>
