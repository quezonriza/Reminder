<!-- Php code for putting a delete button 
and enable to delete a data from the mysql database
-->

<?php
include("../included/dbconn.php");
// Connect to the database

$conn = getConnection();
// Handle delete action
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Delete the user with the specified ID
    $query = "DELETE FROM announcement WHERE announcementId = '$id'";
    mysqli_query($conn, $query);
    
    // Redirect back to the show-data page
    header("Location: announcement.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Delete User</title>
</head>
<body>
    <h1>User Deleted</h1>
</body>
</html>