<?php 
    include "dbpdo.php";
    $conn = dbConnect();
    session_start(); 
?>

<html>
 <head>
  <title>Manage Book Requests</title>
 </head>
 <body>
 <h1>Manage Book Requests</h1>
  <hr>
  <!-- Semester Deadline table. -->
  <h3>Deadlines</h3>

  <div><table border="1">
    <thead>
      <th>Fall-22</th>
      <th>Spring-22</th>
      <th>Summer-22</th>
    </thead>
    <tbody>
    <td style="text-align:center"><?php print getDeadline($conn, 'fallSem')?></td>
    <td style="text-align:center"><?php print getDeadline($conn, 'springSem')?></td>
    <td style="text-align:center"><?php print getDeadline($conn, 'summerSem')?></td>
    </tbody>
  </table></div><br>

  <h3>Requested Books</h3>

  <!-- This is the Existing table of requests and the delete button.-->
  <div>
		<table border="3">
    <thead>
				<th>Title</th>
        <th>Author</th>
				<th>ISBN</th>
        <th>Edition</th>
        <th>Publisher</th>
        <th>Course ID</th>
        <th>Semester</th>
        <th>Qty</th>
        <th bgcolor = #009933>Update</th>
        <th bgcolor = #FF0000 >Delete</th>
			</thead>
			<tbody>
      <?php
        $query = "SELECT R.pid, R.id, B.title, B.author, B.isbn, B.edition, R.cid, R.semester, R.qty, R.bid, B.publisher 
                  FROM requests R, books B 
                  WHERE R.bid = B.id AND R.pid =".$_SESSION['id'];

        foreach ($conn->query($query) as $row) {
          $index = $row['id'];?>
          <tr>
            <form action = "professorUpdateBook.php" method = "post">
              <?php echo '<input type = "hidden" name = "bid" value ="'.$row['bid'].'"/>'; ?>
              <td style="text-align:center"><?php echo $row['title']; ?></td>
              <td style="text-align:center"><?php echo $row['author']; ?></td>
              <td style="text-align:center"><?php echo $row['isbn']; ?></td>
              <td style="text-align:center"><?php echo $row['edition']; ?></td>
              <td style="text-align:center"><?php echo $row['publisher']; ?></td>
              <td><?php echo '<input type = "text" name = "inCourseUpdate'.$index.'"  value ="'.$row['cid'].'"/>'; ?></td>
              <td><?php echo '<select name = "inSemesterUpdate'.$index.'" size="1">';
                              if ($row['semester'] == 'fallSem') print '<option value ="fallSem" selected="selected">Fall</option>';
                              else print '<option value ="fallSem">Fall</option>';

                              if ($row['semester'] == 'springSem') print '<option value ="springSem" selected="selected">Spring</option>';
                              else print '<option value ="springSem">Spring</option>';

                              if ($row['semester'] == 'summerSem') print '<option value ="summerSem" selected="selected">Summer</option>';
                              else print '<option value ="summerSem">Summer</option>';
                              
                              print '</select>'; ?>
              </td>
              <td><?php echo '<input type = "text" name = "inQtyUpdate'.$index.'"  value ="'.$row['qty'].'"/>'; ?></td>
              <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>
              <td><?php echo '<input type="submit" value = "Update" name = "updateBtn'.$index.'"/>';?></td>
              <td><?php echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';?></td>
            </form>								
          </tr>
        <?php }?>
			</tbody>
		</table>
    <p style="color:red;">*Please ensure all requests are up-to-date by the submission deadline.</p>
	</div>
  <br>
    <!-- This is the list of Books the add book button.-->
    <div>
    <h3>Book List</h3>
		<table border="3">
    <thead>
				<th>Title</th>
        <th>Author</th>
				<th>ISBN</th>
        <th>Edition</th>
        <th>Publisher</th>

        <th bgcolor = green >Add</th>
			</thead>
			<tbody>
      <?php
        $query = "SELECT B.id, B.title, B.author, B.isbn, B.edition, B.publisher 
                  FROM books B";

        foreach ($conn->query($query) as $row) {
          $index = $row['id'];?>
          <tr>
            <form action = "professorRequestBook.php" method = "post">

              <td style="text-align:center"><?php echo $row['title']; ?></td>
              <td style="text-align:center"><?php echo $row['author']; ?></td>
              <td style="text-align:center"><?php echo $row['isbn']; ?></td>
              <td style="text-align:center"><?php echo $row['edition']; ?></td>
              <td style="text-align:center"><?php echo $row['publisher']; ?></td>
              <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>
              <td style="text-align:center"><?php echo '<input type="submit" value = "Request" name = "reqBtn'.$index.'"/>';?></td>
            </form>								
          </tr>
        <?php }?>

        <!--Book manual entry-->
        <form action = "addBookTuple.php" method = "post"> 

          <td><?php echo '<input type = "text" name = "inTitle"  value =""/>'; ?></td>
          <td><?php echo '<input type = "text" name = "inAuthor" value =""/>'; ?></td>
          <td style="text-align:center"><?php echo '<input type = "text" name = "inISBN" value =""/>'; ?></td>
          <td ><?php echo '<input type = "text" name = "inEdition" value =""/>'; ?></td>
          <td><?php echo '<input type = "text" name = "inPublisher" value =""/>'; ?></td>
          <td><?php echo '<input type="submit" value = "Add Book"name = "addBtnNew"/></td>';?></td>
        </form>
			</tbody>
		</table>
	</div> 
  <hr>
  <a href = "index.php"><button>Logout</button>
 </body>
</html>
