<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserLogin v.0.1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a login form and attempts to log them in. So far, no restrictions on passwords or login attempts.
 */
include "../helpers/session.php";
include "../helpers/db.php";

$conn = dbConnect();

$email = htmlspecialchars($_POST['email']);
$userPassword = base64_encode(htmlspecialchars($_POST['password'])); // Checking base64 encoding password against stored psswrd

if($conn->connect_error) {
    echo "was in here";
    echo $conn->connect_error;
}

$sqlQuery = "SELECT user.ID, user.FirstName, user.LastName, user.RoleID FROM user WHERE user.Email = " . "'$email'" . " AND user.Password = " . "'$userPassword'" . " AND '$email' NOT IN(SELECT Email FROM blacklist)";

$result = $conn->query($sqlQuery);


$rowsReturned = $result->num_rows;

//  Until more pages are built to redirect to, this will suffice to express a successful login attempt.
if($rowsReturned === 1) {
    echo "Login was successful";
    $row = $result->fetch_assoc();
    saveUserId($row['ID']); // Store ID in HTTP Session
    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CST-126-Projects/BloggingPlatform/main.php"); exit; // Redirect to main dashboard
} elseif($rowsReturned === 0) {
    echo "Login failed";
} elseif ($rowsReturned > 1){
    echo "There are multiple users registered.";
    echo $conn->error;
    session_destroy();
}
$conn->close();
?>