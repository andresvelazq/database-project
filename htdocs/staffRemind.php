<?php
include "dbpdo.php";
?>

<html>
    <title>Reminder Email</title>
    <h1>Reminder Email</h1>
    <body>
        <div>
            <form action = "reminder.php" method = "post">
                <select name = "inSemester" size="1">
                    <option value ="springSem">Spring</option>
                    <option value ="summerSem">Summer</option>
                    <option value ="fallSem">Fall</option>
                </select>
                <input type="submit" value = "Send" name = "sendBtn"/>
            </form>
        </div>
    </body>
</html>