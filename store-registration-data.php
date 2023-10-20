<!-- The php code that store data that was inputed in the registration form. -->

<?php 
 include("included/dbconn.php");

$userid = $_POST['userid'];
$email = $_POST['email'];
$password = $_POST['password']; 
$gender = $_POST['gender'];
$role;
$status;

$conn = getConnection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email input from the form
    $email = $_POST["email"];

    // Define the admin email pattern with the special code "234#"
    $adminEmailPattern = "/234#/";

    // Check if the entered email matches the admin email pattern
    if (preg_match($adminEmailPattern, $email)) {
        // If it matches, set the role to "admin"
        $role = "admin";
        $status = "inactive";
      
    } else {
        // If it doesn't match, set the role to "user"
        $role = "user";
        $status = "inactive";
      
    }
    // Now you can insert the $role value into the database along with other user data

}
$sql = "INSERT INTO users(userid, email ,password, gender, role, status)
VALUES ('".$userid."','".$email."','".$password."','".$gender."','".$role."', '".$status."')";

if ($conn->query($sql) === TRUE) {
    header('Location: login.php');
} else {  
    header('Location: registration-form.php');
}

closeConnection();

?>