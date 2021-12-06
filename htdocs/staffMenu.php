<html>
 <head>
  <title>Staff Menu</title>
 </head>
 <body>
 <h1>Staff Menu </h1>
<?php
  session_start();
  $name = "";
  if(isset($_SESSION['fname'])) 
    $name = $_SESSION['fname'];
  print "Hello ".$name;
?>
 <hr>
 <nav>
    <ul>
      <li>
        <a href = "staffManageStaff.php">Manage Staff Accounts </a> 
      </li>
      <li>
        <a href = "staffManageFaculty.php">Manage Faculty Accounts </a>
      </li>
      <li>
        <a href = "staffEditDB.php">Edit Database</a>
      </li>
      <li>
        <a href = "staffBroadcast.php">Broadcast</a>
      </li>
      <li>
        <a href = "staffViewRequest.php">View Request</a>
      </li>
      <li>
        <a href = "staffFinalList.php">Create Final list </a>
      </li>
      <li>
        <a href = "staffViewList.php">View list </a>
      </li>
    </ul>
  </nav>

 </body>
</html>