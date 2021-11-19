<?php
include "dbpdo.php";

$invite = echo '<a href="someurl.com.html">make book requests</a>';

$subject = "Invite to Request Book Info";
$message = "Professors, please use this link to $invite.";

// word wrap just in case
$message = wordwrap($message, 70, "\r\n");

$sql = "SELECT email FROM professors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $email = $row["email"];
    mail($email, $subject, $message);
}
?>