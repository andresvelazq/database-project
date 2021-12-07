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

<html>
    <title>Invitations</title>
    <h1>Invitations</h1>
    <body>
        <div>
            <form action = "staffMenu.php" method = "post">
                <div>Invitations successfuly sent!</div>
                <input type="submit" value = "Back" name = "backBtn"/>
            </form>
        </div>
    </body>
</html>