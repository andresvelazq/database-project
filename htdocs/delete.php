<?php
    include "dbpdo.php";
    $conn = dbConnect();
	$id=$_GET['id'];

	$query = "SELECT * FROM staff where userid='$id'";
	//$row=mysqli_fetch_array($query);
?>
<html>
<head>
<title>Delete Account </title>
</head>
<body>
	<h2>Edit</h2>
    <!--
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<label>Firstname:</label><input type="text" value="<?php echo $row['firstname']; ?>" name="firstname">
		<label>Lastname:</label><input type="text" value="<?php echo $row['lastname']; ?>" name="lastname">
		<input type="submit" name="submit">
		<a href="index.php">Back</a>
	</form>
    !-->
</body>
</html>