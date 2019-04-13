<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserLogin v.0.1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user data from a login form and attempts to log them in. So far, no restrictions on passwords or login attempts.
 */
include_once("../helpers/session.php");
include_once("../helpers/db.php");

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

$host  = $_SERVER['HTTP_HOST'];
//  Until more pages are built to redirect to, this will suffice to express a successful login attempt.
if($rowsReturned === 1) {
    echo "Login was successful";
    $row = $result->fetch_assoc();
    saveUserId($row['ID']); // Store ID in HTTP Session
    header("Location: http://$host/CST-126-Projects/BloggingPlatform/main.php"); exit; // Redirect to main dashboard
} elseif($rowsReturned === 0) {
    echo '<h2 align="center">Login Failed</h2>';
    echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/login/index.html';\",1500);</script>";
} elseif ($rowsReturned > 1){
    echo '<h2 align="center">There are multiple users registered with that email. Try again.</h2>';
    echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/login/index.html';\",1500);</script>";
    echo $conn->error;
    
    // Destroy session to enable log in next try
    unset($_SESSION['USER_ID']);
    session_destroy();
}
$conn->close();
?>