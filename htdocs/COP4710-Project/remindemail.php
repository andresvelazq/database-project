<?php
include "dbpdo.php";

$subject = "Deadline to Submit Book Requests";
$message = "Professors, please remember to submit your book requests by <deadline>.";

// word wrap just in case
$message = wordwrap($message, 70, "\r\n");

$sql = "SELECT email FROM professors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $email = $row["email"];
    mail($email, $subject, $message);
}
?>