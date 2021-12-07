<?php
include "dbpdo.php";
$conn = dbConnect();

$subject = "Invite to Request Book Info";

$query = "SELECT * FROM professors";

foreach ($conn->query($query) as $row) {
    $message = "Hello Professor ".$row['lname'].",\nPlease use this link to make book requests.\n\nhttp://localhost/cop4710/index.php";
    mail($row['email'], $subject, $message);
}
?>