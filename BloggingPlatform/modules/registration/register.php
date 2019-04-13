<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserRegistration v.0.2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../helpers/db.php";

$firstName = $lastName = $userPassword = $email = "";

// Open MySQL connection
$conn = dbConnect();

if($conn->connect_error) {
    echo $conn->connect_error;
}

$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$email = htmlspecialchars($_POST["email"]);
$userPassword = base64_encode(htmlspecialchars($_POST["password"])); // Encode password

$sqlBlacklistCheck = "SELECT COUNT(*) FROM blacklist WHERE Email = '$email'";

$sqlInsert = "INSERT INTO user (FirstName, LastName, Email, Password, RoleID) 
VALUES ('$firstName', '$lastName', '$email', '$userPassword', 1)"; // Assign RoleID of 1 by default - basic user

// Check email not on blacklist
$blacklistResult = $conn->query($sqlBlacklistCheck);
if (!$blacklistResult) {
    die('Invalid query: ' . $conn->error);
}
$row = $blacklistResult->fetch_array();

$host  = $_SERVER['HTTP_HOST'];
// Check if blacklist table has any entries matching attempted registration
if($row[0] == 0) {
if ($conn->query($sqlInsert) === TRUE) {
   
//     header("Location: http://$host/CST-126-Projects/BloggingPlatform/modules/login/index.html"); exit; // Redirect to login
    echo '<h2 align="center">New user account created successfully</h2>';
    echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/login/index.html';\",1500);</script>";
} else {
    // Email already taken, display error and redirect
    echo '<h2 align="center">Error experienced: That email has already been used!</h2>';
    echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/registration/index.html';\",1500);</script>";
}
} else {
    // Email blacklisted, display error and redirect
    echo '<h2 align="center">That email has been blacklisted for abusive conduct.</h2>';
    echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/registration/index.html';\",1500);</script>";
}

$conn->close();
?>
