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
  <p>Requested Books</p>
  <!-- This is the Existing table of requests and the delete button.-->
  <div>
		<table border="3">
    <thead>
				<th>Title</th>
        <th>Author</th>
				<th>ISBN</th>
        <th>Edition</th>
        <th>Course ID</th>
        <th>Semester</th>
        <th>Qty</th>
        <th bgcolor = #009933>Update</th>
        <th bgcolor = #FF0000 >Delete</th>
			</thead>
			<tbody>
      <?php
        $query = "SELECT R.pid, R.id, B.title, B.author, B.isbn, B.edition, R.cid, R.semester, R.qty, R.bid 
                  FROM requests R, books B 
                  WHERE R.bid = B.id AND R.pid =".$_SESSION['id'];

        foreach ($conn->query($query) as $row) {
          $index = $row['id'];?>
          <tr>
            <form action = "updateBook.php" method = "post">
              <?php echo '<input type = "hidden" name = "bid" value ="'.$row['bid'].'"/>'; ?>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['author']; ?></td>
              <td><?php echo $row['isbn']; ?></td>
              <td><?php echo $row['edition']; ?></td>
              <td><?php echo '<input type = "text" name = "inCourseUpdate'.$index.'"  value ="'.$row['cid'].'"/>'; ?></td>
              <td><?php echo '<input type = "text" name = "inSemesterUpdate'.$index.'"  value ="'.$row['semester'].'"/>'; ?></td>
              <td><?php echo '<input type = "text" name = "inQtyUpdate'.$index.'"  value ="'.$row['qty'].'"/>'; ?></td>
              <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>
              <td><?php echo '<input type="submit" value = "Update" name = "updateBtn'.$index.'"/>';?></td>
              <td><?php echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';?></td>
            </form>								
          </tr>
        <?php }?>
			</tbody>
		</table>
	</div>
  <br><br>
    <!-- This is the table of Books that have not been requested and the add button.-->
    <div>
    <h3>Book List</h3>
		<table border="3">
    <thead>
				<th>Title</th>
        <th>Author</th>
				<th>ISBN</th>
        <th>Edition</th>
        <th>Course ID</th>
        <th>Semester</th>
        <th>Quantity</th>

        <th bgcolor = green >Add</th>
			</thead>
			<tbody>
      <?php
        $query = "SELECT B.id, B.title, B.author, B.isbn, B.edition 
                  FROM books B";

        foreach ($conn->query($query) as $row) {
          $index = $row['id'];?>
          <tr>
            <form action = "addBook.php" method = "post">

              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['author']; ?></td>
              <td><?php echo $row['isbn']; ?></td>
              <td><?php echo $row['edition']; ?></td>
              <td><?php echo '<input type = "text" name = "inCourse'.$index.'"  value =""/>'; ?></td>
              <td><?php echo '<input type = "text" name = "inSemester'.$index.'"  value =""/>'; ?></td>
              <td><?php echo '<input type = "text" name = "inQty'.$index.'"  value =""/>'; ?></td>
              <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>
              <td><?php echo '<input type="submit" value = "Add" name = "addBtn'.$index.'"/>';?></td>
            </form>								
          </tr>
        <?php }?>
			</tbody>
		</table>
	</div> 


 </body>
</html>
