<?php
/*
 * Project: activity2
 * Module Name: activity2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This script takes user login fields in a POST request and authenticates them against the users database.
 */
$username = $userPassword = "";
// Below -> Safely get Env Vars, per https://secure.php.net/manual/en/function.getenv.php
$user = (getenv('CLEARDB_DATABASE_USER', true) ?: getenv('CLEARDB_DATABASE_USER')) ?: 'root';
$password = (getenv('CLEARDB_DATABASE_PASSWORD', true) ?: getenv('CLEARDB_DATABASE_PASSWORD')) ?: 'root';
$db = (getenv('CLEARDB_DATABASE_DB', true) ?: getenv('CLEARDB_DATABASE_DB')) ?: 'blog';
$host = (getenv('CLEARDB_DATABASE_HOST', true) ?: getenv('CLEARDB_DATABASE_HOST')) ?: 'localhost';

$username = htmlspecialchars($_POST['username']);
$userPassword = htmlspecialchars($_POST['password']);

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_error) {
    echo "was in here";
    echo $conn->connect_error;
}

$sqlQuery = "SELECT * FROM activity2_users WHERE USERNAME = " . "'$username'" . " AND PASSWORD = " . "'$userPassword'";

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