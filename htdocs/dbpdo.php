<?php
function dbConnect(){
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="THISisap@ssword";
  $db="cop4710project";


  $dsn = "mysql:host=$dbhost;dbname=$db";

  try{
    $db= new PDO($dsn, $dbuser, $dbpass);
    // echo "You have connected";
    return $db;
  }catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
  }
}

function printStaff($conn){
  $query = "SELECT * FROM staff";
  foreach ($conn->query($query) as $row) {
    print "sid: " .$row['sid'] ."<br>";
    print "Fname: " .$row['fname']. "<br>";
    print "Lname: " .$row['lname']. "<br>";
    print "Email: " .$row['email']. "<br>";
    print "Password: " .$row['password']. "<br>";
    print "Sadmin: " .$row['sadmin']. "<br>";
    print "<br>";
  }
}

function printProfessors($conn){
  $query = "SELECT * FROM professors";
  foreach ($conn->query($query) as $row) {
    print "pid: " .$row['pid'] ."<br>";
    print "Fname: " .$row['fname']. "<br>";
    print "Lname: " .$row['lname']. "<br>";
    print "Email: " .$row['email']. "<br>";
    print "Password: " .$row['password']. "<br>";
    print "<br>";
  }
}

function printBooks($conn){
  $query = "SELECT * FROM books";
  foreach ($conn->query($query) as $row) {
    print "bid: " .$row['bid'] ."<br>";
    print "Title: " .$row['Title']. "<br>";
    print "Author: " .$row['Author']. "<br>";
    print "ISBN: " .$row['ISBN']. "<br>";
    print "<br>";
  }
}

?>