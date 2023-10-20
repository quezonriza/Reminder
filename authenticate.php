<?php
session_start();
include_once("included/dbconn.php");

$conn = getConnection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * from users where email = '".$email."' and password = '".$password."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["email"] == $email && $row["password"]== $password){

    // Set the user_id in the session
    $_SESSION["userid"] = $row["userid"];

    // Update the user's status to "active" in the database
    $user_id = $row["userid"];
    if($row["role"]=="admin")
    {        
        header("Location: adminpage/admindashboard.php");
    }
    else
    {        
        header("Location: userpage/userdashboard.php");
    }
    $_SESSION["Role"] = $row["role"];

    $update_status_sql = "UPDATE users SET status = 'active' WHERE userid = '$user_id'";
    $conn->query($update_status_sql);


    
}
else
{
    header("Location: login.html");
}

closeConnection();


?>