<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserLogin v.0.1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a login form and attempts to log them in. So far, no restrictions on passwords or login attempts.
 */


// Local vars
$user = 'root';
$password = 'root';
$db = 'blog';
$host = 'localhost';
$port = 8889;

// Prod vars
// $user = 'azure';
// $password = '6#vWHD_$';
// $db = 'blog';
// $host = '127.0.0.1';
// $port = 49585;

$email = htmlspecialchars($_POST['email']);
$userPassword = base64_encode(htmlspecialchars($_POST['password'])); // Checking base64 encoding password against stored psswrd

$conn = new mysqli($host, $user, $password, $db, $port);

if($conn->connect_error) {
    echo "was in here";
    echo $conn->connect_error;
}

$sqlQuery = "SELECT * FROM user WHERE Email = " . "'$email'" . " AND Password = " . "'$userPassword'";

$result = $conn->query($sqlQuery);


$rowsReturned = $result->num_rows;

//  Until more pages are built to redirect to, this will suffice to express a successful login attempt.
if($rowsReturned === 1) {
    echo "Login was successful";
} elseif($rowsReturned === 0) {
    echo "Login failed";
} elseif ($rowsReturned > 1){
    echo "There are multiple users registered.";
    echo $conn->error;
}
$conn->close();
?>