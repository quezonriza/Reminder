<?php 
 include("included/dbconn.php");

$id = $_POST['id'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname']; 
$age = $_POST['age']; 
$address = $_POST['address'];

$conn = getConnection();

$sql = "INSERT INTO users(id, firstname ,lastname, age, address)
VALUES ('".$id."','".$firstName."','".$lastName."', '".$age."', '".$address."')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../php/show-data.php');
} else {  
    header('Location: ../html/registration-form.html');
}

$conn->close();

?>