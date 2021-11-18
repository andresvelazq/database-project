<?php
include "dbpdo.php";

$subject = "Deadline to Submit Book Requests";
$message = "Professors, please remember to submit your book requests by <deadline>.";

// word wrap just in case
$message = wordwrap($message, 70, "\r\n);

mail(email, $subject, $message);
?>