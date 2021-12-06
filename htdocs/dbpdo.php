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
    print "id: " .$row['id'] ."<br>";
    print "Fname: " .$row['fname']. "<br>";
    print "Lname: " .$row['lname']. "<br>";
    print "Email: " .$row['email']. "<br>";
    print "Password: " .$row['password']. "<br>";
    print "Sadmin: " .$row['sadmin']. "<br>";
    print "Secret: " .$row['secret']. "<br>";
    print "<br>";
  }
}

function printProfessors($conn){
  $query = "SELECT * FROM professors";
  foreach ($conn->query($query) as $row) {
    print "id: " .$row['id'] ."<br>";
    print "Fname: " .$row['fname']. "<br>";
    print "Lname: " .$row['lname']. "<br>";
    print "Email: " .$row['email']. "<br>";
    print "Password: " .$row['password']. "<br>";
    print "Secret: " .$row['secret']. "<br>";
    print "<br>";
  }
}

function printBooks($conn){
  $query = "SELECT * FROM books";
  foreach ($conn->query($query) as $row) {
    print "id: " .$row['id'] ."<br>";
    print "Title: " .$row['Title']. "<br>";
    print "Author: " .$row['Author']. "<br>";
    print "ISBN: " .$row['ISBN']. "<br>";
    print "<br>";
  }
}

// Creates a session and session variables for a given index and table.
function sessionInfo($conn, $index, $table){
  session_start();

  // Professors table.
  if ($table == "professors"){
    $query = "SELECT * FROM $table WHERE id = $index";

    foreach ($conn->query($query) as $result) {
      $_SESSION["id"] = $result['id'];
      $_SESSION["fname"] = $result['fname'];
      $_SESSION["lname"] = $result['lname'];
      $_SESSION["email"] = $result['email'];
      $_SESSION["password"] = $result['password'];
      $_SESSION["secret"] = $result['secret'];
      $_SESSION["reset"] = $result['reset'];
      $_SESSION["table"] = $table;
    }
  }

  // Staff table.
  if ($table == "staff"){
    $query = "SELECT * FROM $table WHERE id = $index";

    foreach ($conn->query($query) as $result) {
      $_SESSION["id"] = $result['id'];
      $_SESSION["fname"] = $result['fname'];
      $_SESSION["lname"] = $result['lname'];
      $_SESSION["email"] = $result['email'];
      $_SESSION["password"] = $result['password'];
      $_SESSION["sadmin"] = $result['sadmin'];
      $_SESSION["secret"] = $result['secret'];
      $_SESSION["reset"] = $result['reset'];
      $_SESSION["table"] = $table;
    }
  }

    // Books table.
    if ($table == "books"){
      $query = "SELECT * FROM $table WHERE id = $index";
  
      foreach ($conn->query($query) as $result) {
        $_SESSION["id"] = $result['id'];
        $_SESSION["title"] = $result['title'];
        $_SESSION["author"] = $result['author'];
        $_SESSION["isbn"] = $result['isbn'];
        $_SESSION["edition"] = $result['edition'];
        $_SESSION["publisher"] = $result['publisher'];
        $_SESSION["table"] = $table;
      }
    }
}

function getDeadline($conn, $semester){
  $query = "SELECT deadline FROM deadlines WHERE semester = '$semester'";
  foreach ($conn->query($query) as $result) {
    return $result['deadline'];
  }
}

?>