<?php
/*
 * Project: activity2
 * Module Name: activity2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user login fields in a POST request and authenticates them against the users database.
 */

$user = 'root';
$password = 'root';
$db = 'activity2';
$host = 'localhost';
$port = 8889;

$username = htmlspecialchars($_POST['username']);
$userPassword = htmlspecialchars($_POST['password']);

$conn = new mysqli($host, $user, $password, $db, $port);

if($conn->connect_error) {
    echo "was in here";
    echo $conn->connect_error;
}

$sqlQuery = "SELECT * FROM users WHERE USERNAME = " . "'$username'" . " AND PASSWORD = " . "'$userPassword'";

$result = $conn->query($sqlQuery);


$rowsReturned = $result->num_rows;

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