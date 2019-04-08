<?php
/*
 * Project: activity6
 * Module Name: activity6
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This script holds utility functions that query the users table and return the results.
 */
require_once('myfuncs.php');

function getAllUsers() {
    $conn = dbConnect();
    $sqlQuery = "SELECT ID, FIRST_NAME, LAST_NAME FROM activity4_users";
    $result = $conn->query($sqlQuery);
    $users = array();
   
    $index = 0;
    while($row = $result->fetch_assoc()) {
       $users[$index] = array(
           $row["ID"], $row["FIRST_NAME"], $row["LAST_NAME"]
       );
       
       ++$index;
    }
    
    return $users;
    $conn->close();
}

function getUsersByFirstName($pattern) {
    $conn = dbConnect();
    $sqlQuery = "SELECT * FROM activity6_users WHERE FIRST_NAME LIKE '%" . $pattern . "%'";
    $result = $conn->query($sqlQuery);
    if($result->num_rows == 0) {
        return;
    }
    return $result->fetch_all();
    
    $conn->close();
}
?>