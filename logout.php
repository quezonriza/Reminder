<?php
session_start();
session_destroy();
include("included/dbconn.php");

// Check if the 'logout' parameter is present in the URL
if (isset($_GET['logout'])) {
    // Change the user's status to "inactive" when logging out
    $userid = $_SESSION['userid']; // Assuming you have a user ID in the session

    $conn = getConnection();

    // Update the user's status to "inactive" in the database
    $sql = "UPDATE users SET status = 'inactive' WHERE userid = $userid";

    if ($conn->query($sql) === TRUE) {
        // Redirect the user to a logged-out page or perform any other actions
        header('Location: landingpage.php');
        exit; // Terminate the script after redirection
    } else {
        header('Location: landingpage.php');

        // Handle the error (e.g., log it or show an error message)
    }

    closeConnection();
}

?>