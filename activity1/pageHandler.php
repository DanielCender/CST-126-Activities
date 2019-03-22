<?php
/*
 * Project: activity1
 * Module Name: activity1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a registration form and attempts to create a new user in the db.
 */
$firstName = $lastName = "";

$user = (getenv('CLEARDB_DATABASE_USER', true) ?: getenv('CLEARDB_DATABASE_USER')) ?: 'root';
$password = (getenv('CLEARDB_DATABASE_PASSWORD', true) ?: getenv('CLEARDB_DATABASE_PASSWORD')) ?: 'root';
$db = (getenv('CLEARDB_DATABASE_DB', true) ?: getenv('CLEARDB_DATABASE_DB')) ?: 'blog';
$host = (getenv('CLEARDB_DATABASE_HOST', true) ?: getenv('CLEARDB_DATABASE_HOST')) ?: 'localhost';

$port = 8889;

$conn = new mysqli($host, $user, $password, $db);

if (empty($_POST['firstName'])) {
    echo "The First Name is a required field and cannot be blank.";
} elseif (empty($_POST['lastName'])) {
    echo "The Last Name is a required field and cannot be blank.";
} else {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    // Open MySQL connection
    $conn = new mysqli($host, $user, $password, $db);
    
    if ($conn->connect_error) {
        echo $conn->connect_error;
    }
    
    $sqlInsert = "INSERT INTO activity1_users (FIRST_NAME, LAST_NAME) VALUES('$firstName', '$lastName')";
    
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
