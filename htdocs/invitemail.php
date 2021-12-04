<?php
include "dbpdo.php";
$conn = dbConnect();


$invite = '<a href="someurl.com.html">make book requests</a>';

$subject = "Invite to Request Book Info";
$message = "Please use this link to $invite.";

// word wrap just in case
$message = wordwrap($message, 70, "\r\n");

$query = "SELECT * FROM professors";

foreach ($conn->query($query) as $row) {
    print "To: " .$row['email']. "<br>
    Subject: " .$subject. "<br>
    Message: <br> Hello Professor ".$row['lname']. ",<br>" .$message. "<br><br>";
    // mail($row['email'], $subject, $message);
}
?>