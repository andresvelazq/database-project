<?php
    include "dbpdo.php";
    $conn = dbConnect(); // connect to DB.
?>


<html>
  <body>
    <?php
      $title = $_POST["inTitle"];
      $author = $_POST["inAuthor"];
      $isbn = $_POST["inISBN"];
      $edition = $_POST["inEdition"];
      $publisher = $_POST['inPublisher'];
      
      if(empty($title) || empty($author) || empty($isbn) || empty($edition) || empty($publisher)){
        header("Location: professorBookRequest.php");//no update if fields all/some are empty
        exit();      
    }      
      $add = "INSERT INTO books (`title`, `author`, `isbn`, `edition`, `publisher`) 
              VALUES ('$title', '$author', '$isbn','$edition','$publisher')";
      $stmt = $conn->prepare($add);
      //execute query
      $stmt->execute();
      
      // print staff table.
        printStaff($conn);
              header("Location: professorBookRequest.php");//goes back to staffmenutacc after addition the change is visible 
        exit();
    ?>
  </body>
</html>
