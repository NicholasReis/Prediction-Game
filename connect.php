<?php
    //Not real information--------
    $servername = "severname";
    $username = "username";
    $password = "password";
    $database = "database";
    //----------------------------

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();

    }else{
      echo "Connected successfully";
    }
?>