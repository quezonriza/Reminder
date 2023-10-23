<?php

 // Check if the form is submitted
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Retrieve the receiver ID and message content from the form
     $receiverId = $_POST['receiverId'];
     $messageContent = $_POST['messageContent'];
     $intendedTo = $_POST['intendedTo'];
 
     // Validate and process the data as needed
     // ...

     $servername = 'localhost';
     $username = 'root';
     $password = '';
     $dbname = 'reminder_list';
 
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     if($conn->connect_error){
         die("Connection failed: " .$conn->connect_error);
     }
     // Prepare and execute the SQL statement to insert the notification data
     $sql = "INSERT INTO announcement(userid, messageContent, intendedTo) VALUES (?, ?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("iss", $receiverId, $messageContent, $intendedTo);
     $stmt->execute();
 
     // Check if the insertion was successful
     if ($stmt->affected_rows > 0) {
        header('Location: admindashboard.php');
     } else {
        echo "Failed to store notification data.";
     }
     $conn->close();
 }
 

 ?>

