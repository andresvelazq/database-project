<?php 
    include "dbpdo.php";
    $conn = dbConnect();
    $semester = 'springSem';
    if (isset($_POST['inSemester'])){ 
      $semester = $_POST['inSemester'];
    }
?>

<html>
 <head>
  <title>View Requests</title>
 </head>
 <body>
  <h1>View Requests</h1>
     <hr>

<table border="1">
  <tr>
    <th>Semester</th>
    <th>Professor</th>
    <th>Course Number</th>
    <th>Book</th>
    <th>Author</th>
    <th>Edition</th>
    <th>ISBN</th>
    <th>Quantity</th>
  </tr>
  <tbody>
    <?php
      $query = "SELECT R.semester, R.pid, P.fname, P.lname, R.cid, R.bid, B.title, B.author, B.edition, B.isbn, R.qty
                FROM requests R, books B, professors P
                WHERE R.bid = B.id AND R.pid = P.id AND R.semester = '$semester'";

      foreach ($conn->query($query) as $row) {
        $index = $row['semester'];?>
        <tr>
          <td style="text-align:center"><?php echo $row['semester']; ?></td>
          <td style="text-align:center"><?php echo $row['lname'].', '.$row['fname']; ?></td>
          <td style="text-align:center"><?php echo $row['cid']; ?></td>
          <td style="text-align:center"><?php echo $row['title']; ?></td>
          <td style="text-align:center"><?php echo $row['author']; ?></td>
          <td style="text-align:center"><?php echo $row['edition']; ?></td>
          <td style="text-align:center"><?php echo $row['isbn']; ?></td>
          <td style="text-align:center"><?php echo $row['qty']; ?></td>
        </tr>
      <?php } ?>
  </tbody>
  
</table>
<form action="staffViewList.php" method="post">
    <select name = "inSemester" size="1">
    <?php
      
      if ($semester == 'fallSem') print '<option value ="fallSem" selected="selected">Fall</option>';
      else print '<option value ="fallSem">Fall</option>';

      if ($semester == 'springSem') print '<option value ="springSem" selected="selected">Spring</option>';
      else print '<option value ="springSem">Spring</option>';

      if ($semester == 'summerSem') print '<option value ="summerSem" selected="selected">Summer</option>';
      else print '<option value ="summerSem">Summer</option>';
    ?>
    </select>
    <input type="submit", value="Submit", name="submitBtn"/>
  </form>
 </body>
</html>