<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: helpers v.0.1
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This script includes helper methods for interacting with the database
 */

$user = 'root';
$password = 'root';
$db = 'blog';
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
?>