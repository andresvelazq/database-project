<?php
include "dbpdo.php";
$conn = dbConnect();
$semester = $_POST['inSemester'];

$deadline = getDeadline($conn, $semester);

$subject = "Deadline to Submit Book Requests";

$query = "SELECT * FROM professors";

foreach ($conn->query($query) as $row) {
    $message = "Hello Professor ".$row['lname'].",\nPlease remember to submit your book requests by $deadline.";
    mail($row['email'], $subject, $message);
}

header("Location: staffMenu.php");
?>