<?php
/*
 * Project: activity3
 * Module Name: activity3
 * Author: Daniel Cender
 * Date: March 12, 2019
 * Synopsis: This script takes user login fields in a POST request and authenticates them against the users database.
 */
include 'myfuncs.php';

$username = htmlspecialchars($_POST['username']);
$userPassword = htmlspecialchars($_POST['password']);

$conn = dbConnect(); // Open connection with func call

$sqlQuery = "SELECT * FROM activity3_users WHERE USERNAME = " . "'$username'" . " AND PASSWORD = " . "'$userPassword'";

$result = $conn->query($sqlQuery);


$rowsReturned = $result->num_rows;

if($rowsReturned === 1) {
    $row = $result->fetch_assoc();
    saveUserId($row['ID']);
    include('loginResponse.php');
} elseif($rowsReturned === 0) {
    $message = "Login Failed";
    include('loginFailed.php');
} elseif ($rowsReturned > 1){
    echo "There are multiple users registered.";
    echo $conn->error;
}
$conn->close();
?>