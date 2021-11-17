<?php
function OpenConSQLI(){
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="THISisap@ssword";
  $db="cop4710-project";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

  return $conn;
}

function CloseCon($conn){
  $conn -> close();
}
?>