<?php
include "dbpdo.php";

$subject = "Invite to Request Book Info";
$message = "Professors, please use this link to log in <link>.";

// word wrap just in case
$message = wordwrap($message, 70, "\r\n);

mail(email, $subject, $message);
?>