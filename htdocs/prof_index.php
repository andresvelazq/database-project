<html> 
  <body>
    <h1>Professor login successful</h1>
    <?php
      include "dbpdo.php";
      $conn = dbConnect();
      sessionInfo($conn, 2, "books");
      print "Fname: " .$_SESSION["title"]. "<br>";
      session_destroy();

    ?>
  </body>
</html>