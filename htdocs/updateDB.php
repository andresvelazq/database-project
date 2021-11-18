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
      
      echo 'Index: ' .$index;
      echo 'SID: ' .$sid;
      echo 'Fname: ' .$fname;
      echo 'Lname: ' .$lname;
      echo 'Email: ' .$email;
      echo 'Password: ' .$password;
      echo 'sadmin: ' .$sadmin;
      echo ''
    ?>
  </body>
</html>