<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: helpers v.0.1
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This script includes helper methods for interacting with the database
 */

// Below -> Safely get Env Vars, per https://secure.php.net/manual/en/function.getenv.php
$user = (getenv('CLEARDB_DATABASE_USER', true) ?: getenv('CLEARDB_DATABASE_USER')) ?: 'root';
$password = (getenv('CLEARDB_DATABASE_PASSWORD', true) ?: getenv('CLEARDB_DATABASE_PASSWORD')) ?: 'root';
$db = (getenv('CLEARDB_DATABASE_DB', true) ?: getenv('CLEARDB_DATABASE_DB')) ?: 'blog';
$host = (getenv('CLEARDB_DATABASE_HOST', true) ?: getenv('CLEARDB_DATABASE_HOST')) ?: 'localhost';


function dbConnect() {
    global $host, $user, $password, $db;
    // Open MySQL connection
    $conn = new mysqli($host, $user, $password, $db);
    
    if($conn->connect_error) {
        echo $conn->connect_error;
    }
    return $conn;
}
?>