<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["Role"]) || $_SESSION["Role"] !== "user") {
    header("Location: login.php");
    exit();
}

include_once("../included/dbconn.php"); // Include your database connection file

// Check if activityid is provided in the URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $activityid = $_GET["id"];

    // Retrieve the activity details from the database
    $conn = getConnection(); // Assume you have a function to get the database connection
    $query = "SELECT * FROM activity WHERE activityid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $activityid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the activity exists
    if ($result->num_rows > 0) {
        $activity = $result->fetch_assoc();
    } else {
        // Redirect to userdashboard.php if activity not found
        header("Location: userdashboard.php");
        exit();
    }
} else {
    // Redirect to userdashboard.php if activityid is not provided or invalid
    header("Location: userdashboard.php");
    exit();
}

// Handle form submission for editing activity
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve updated activity data from the form
    $newTitle = $_POST["title"];
    $newDate = $_POST["date"];
    $newTime = $_POST["time"];
    $newLocation = $_POST["location"];
    $newOotd = $_POST["ootd"];
    $newRemarks = $_POST["remarks"];
    
    // Update the activity in the database
    $updateQuery = "UPDATE activity SET title=?, date=?, time=?, location=?, ootd=?, remarks=? WHERE activityid=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssssi", $newTitle, $newDate, $newTime, $newLocation, $newOotd, $newRemarks, $activityid);
    $stmt->execute();
    
    // Redirect to userdashboard.php after updating the activity
    header("Location: userdashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your HTML head content here -->
    <title>Edit Activity</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #ffffff;
    color: #333333;
}

h1 {
    color: #008000;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #008000;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(0, 128, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #008000;
}

input[type="text"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #008000;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #008000;
    color: #ffffff;
    border: none;
    padding: 15px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: #005700;
}

/* Optional: Add styles for textareas if needed */
textarea {
    resize: vertical;
}

/* Optional: Add more styling as needed */

</style>

<body>
    <!-- Edit Activity Form -->
    <h1>Edit Activity</h1>
    <form method="post" action="">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $activity['title']; ?>" required><br>
        
        <label>Date:</label>
        <input type="date" name="date" value="<?php echo $activity['date']; ?>" required><br>
        
        <label>Time:</label>
        <input type="time" name="time" value="<?php echo $activity['time']; ?>" required><br>
        
        <label>Location:</label>
        <input type="text" name="location" value="<?php echo $activity['location']; ?>" required><br>
        
        <label>Ootd:</label>
        <textarea name="ootd" required><?php echo $activity['ootd']; ?></textarea><br>
        
        <label>Remarks:</label>
        <textarea name="remarks"><?php echo $activity['remarks']; ?></textarea><br>
        
        <input type="submit" value="Update Activity">
    </form>

    <!-- Add your HTML body content here -->
</body>

</html>
