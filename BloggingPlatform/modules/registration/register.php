<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserRegistration v.0.2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */

$firstName = $lastName = $userPassword = $email = "";

// Local Vars
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

// Open MySQL connection
$conn = new mysqli($host, $user, $password, $db, $port);

if($conn->connect_error) {
    echo $conn->connect_error;
}

$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$email = htmlspecialchars($_POST["email"]);
$userPassword = base64_encode(htmlspecialchars($_POST["password"])); // Encode password

$sqlInsert = "INSERT INTO User (FirstName, LastName, Email, Password) VALUES('$firstName', '$lastName', '$email', '$userPassword')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "New user account created successfully";
} else {
    echo "Error experienced: " . $sqlInsert . "<br>" . $conn->error;
}

$conn->close();
?>
