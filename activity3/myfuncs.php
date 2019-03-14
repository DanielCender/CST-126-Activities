<?php
/*
 * Project: activity3
 * Module Name: activity3
 * Author: Daniel Cender
 * Date: March 11, 2019
 * Synopsis: This file holds a function that returns a connection to the MySQL database.
 */

$user = 'root';
$password = 'root';
$db = 'activity3';
$host = 'localhost';
$port = 8889;

function dbConnect() {
    global $host, $user, $password, $db, $port;
    // Open MySQL connection
    $conn = new mysqli($host, $user, $password, $db, $port);
    
    if($conn->connect_error) {
        echo $conn->connect_error;
    }
    return $conn;
}

// Func starts a PHP session with the user's id
function saveUserId($id) {
    session_start();
    $_SESSION['USER_ID'] = $id;
}

// Func returns ID from PHP session
function getUserId() {
    session_start();
    return $_SESSION['USER_ID'];
}

?>