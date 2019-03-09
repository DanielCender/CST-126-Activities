<?php
/*
 * Project: activity1
 * Module Name: activity1
 * Author: Daniel Cender
 * Date: March 3, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */

//  Extracted form fields
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$user = 'root';
$password = 'root';
$db = 'activity1';
$host = 'localhost';
$port = 8889;

// Open MySQL connection
$conn = new mysqli($host, $user, $password, $db, $port);

if($conn->connect_error) {
    echo $conn->connect_error;
}

$sqlInsert = "INSERT INTO users (FIRST_NAME, LAST_NAME) VALUES('$firstName', '$lastName')";

if ($conn->query($sqlInsert) === TRUE) {
    echo "First Name is " . $firstName . "<br>";
    echo "Last Name is " . $lastName . "<br>";
    echo "You are now registered.<br>";
} else {
    echo "Error experienced: " . $sqlInsert . "<br>" . $conn->error;
}

$conn->close();
?>
