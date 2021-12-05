
<html> 
  <body>
    <h1>Professor login successful</h1>
    <?php
      session_start();
      print "Fname: " .$_SESSION["fname"]. "<br>";
      print "Lname: " .$_SESSION["lname"]. "<br>";
      print "email: " .$_SESSION["email"]. "<br>";
      // session_destroy();

    ?>
  </body>
</html>