<?php 

$conn = new mysqli('localhost', 'root','','firebase_chat');
    
    if($conn->connect_error) {
      echo $error = $conn->connect_error;
    }
