<!-- store data -->
<?php 
// Check if the user is logged in and has a valid session
session_start();
include("../included/dbconn.php");

if (!isset($_SESSION['userid'])) {
    // Redirect the user to the login page or handle unauthorized access
    header('Location: login.php');
    exit();
}

// Retrieve the user's ID from the session
$activityid = $_POST['activityid'];
$userid = $_SESSION['userid'];
$title = $_POST['title'];
$date = $_POST['date']; 
$time = $_POST['time']; 
$location = $_POST['location'];
$ootd = $_POST['ootd'];
$priority = $_POST['priority'];
$status = 'inprogress';
$remarks = $_post['remarks'];


$conn = getConnection();

$sql = "INSERT INTO activity (activityid, userid, title, date, time, location, ootd, priority)
VALUES ('".$activityid."', '".$userid."', '".$title."','".$date."', '".$time."', '".$location."', '".$ootd."', '".$priority."')";

if ($conn->query($sql) === TRUE) {
    header('Location: userdashboard.php');
} else {  
    header('Location: ../html/registration-form.html');
}

closeconnection();

?>