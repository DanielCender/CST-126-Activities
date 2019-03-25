<?php
/*
 * Project: activity4
 * Module Name: activity4
 * Author: Daniel Cender
 * Date: March 23, 2019
 * Synopsis: This script reads all users from the database and saves the results to a multi-dimensional array.
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
?>