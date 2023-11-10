<?php
   session_start();
   include_once "config.php";
   $conn = mysqli_connect("localhost:3008", "root", "chat", "chat"); // Select the "chat" database during the connection
   if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
   }
   $outgoing_id = $_SESSION['unique_id'];
   $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
   $output = "";

   if(mysqli_num_rows($sql) == 1) {
      $output  .= "No users are available to chat";
   } elseif(mysqli_num_rows($sql) > 0) {
       include "data.php";
       
   }
   echo $output;
?>





