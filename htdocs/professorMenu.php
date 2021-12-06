<?php session_start();?>
<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <h1>Professor Menu </h1>
<?php
  print "Hello ".$_SESSION['fname'];
?>
 <hr>
 <nav>
    <ul>
      <li>
        <a href = "professorBookRequest.php">Create New Book Request</a> 
      </li>
      <li>
        <a href = "professorBookRequest.php">Edit an Existing Book Request </a>
      </li>
    </ul>
  </nav>

 </body>
</html>
<?//php session_destroy();?>
