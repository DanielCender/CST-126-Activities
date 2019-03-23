<?php
/*
 * Project: activity4
 * Module Name: activity4
 * Author: Daniel Cender
 * Date: March 23, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */
include 'myfuncs.php'; // import file's functions

$firstName = $lastName = "";


if (empty($_POST['firstName'])) {
    echo "The First Name is a required field and cannot be blank.";
} elseif (empty($_POST['lastName'])) {
    echo "The Last Name is a required field and cannot be blank.";
} else {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $username = htmlspecialchars($_POST['username']);
    $userPassword = htmlspecialchars($_POST['password']);
    // Open MySQL connection with function call
    $conn = dbConnect();
    
    $sqlInsert = "INSERT INTO activity4_users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUES('$firstName', '$lastName', '$username', '$userPassword')";
    
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
