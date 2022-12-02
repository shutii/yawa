<?php
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $db = "pos_inv";
  
    // Create connection
    $con = mysqli_connect($servername, $uname, $pass, $db);
  
    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>