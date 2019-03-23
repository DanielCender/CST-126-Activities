<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserRegistration v.0.2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */
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

$sqlInsert = "INSERT INTO user (FirstName, LastName, Email, Password) VALUES('$firstName', '$lastName', '$email', '$userPassword')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "New user account created successfully";
    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CST-126-Projects/BloggingPlatform/modules/login/index.html"); exit; // Redirect to login
} else {
    echo "Error experienced: " . $sqlInsert . "<br>" . $conn->error;
}

$conn->close();
?>
