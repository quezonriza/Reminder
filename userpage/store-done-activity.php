<?php
include("../included/dbconn.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $activityId = $_POST['activityid'];
    $remarks = $_POST['remarks'];

    // Update status to 'done' in the activity table
    $updateQuery = "UPDATE activity SET status = 'done',  remarks = '$remarks' WHERE activityid = $activityId";

    // Execute the update query
    if (mysqli_query(getConnection(), $updateQuery)) {
        // Redirect to a success page or the previous page
        header("Location: userdashboard.php");
        exit();
    } else {
        // Handle the error if the update query fails
        echo "Error updating activity status: " . mysqli_error(getConnection());
    }
} else {
    // Handle the case if the form is not submitted
    echo "Form not submitted.";
}
?>