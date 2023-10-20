<?php
include("../included/dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET['id'];

    // Update status to 'active' in the users table
    $updateQuery = "UPDATE users SET accountStatus = 'activated' WHERE userid = $userId";

    if (mysqli_query(getConnection(), $updateQuery)) {
        // Redirect to a success page or the previous page
        header("Location: admindashboard.php");
        exit();
    } else {
        // Handle the error if the update query fails
        echo "Error activating account: " . mysqli_error(getConnection());
    }
} else {
    echo "Invalid request!";
}
?>