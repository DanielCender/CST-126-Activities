<?php
/*
 * Project: activity1
 * Module Name: activity1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */
$firstName = $lastName = "";

$user = 'root';
$password = 'root';
$db = 'activity1';
$host = 'localhost';
$port = 8889;

if (empty($_POST['firstName'])) {
    echo "The First Name is a required field and cannot be blank.";
} elseif (empty($_POST['lastName'])) {
    echo "The Last Name is a required field and cannot be blank.";
} else {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    // Open MySQL connection
    $conn = new mysqli($host, $user, $password, $db, $port);
    
    if ($conn->connect_error) {
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
    
}
?>
