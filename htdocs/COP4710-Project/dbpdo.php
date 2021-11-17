<?php
function dbConnect(){
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="THISisap@ssword";
  $db="cop4710project";


  $dsn = "mysql:host=$dbhost;dbname=$db";

  try{
    $db= new PDO($dsn, $dbuser, $dbpass);
    echo "You have connected";
    return $db;
  }catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
  }
}

?>