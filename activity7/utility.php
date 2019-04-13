<?php
/*
 * Project: activity7
 * Module Name: activity7
 * Author: Daniel Cender
 * Date: April 9, 2019
 * Synopsis: This script holds utility functions that query the users table and return the results.
 */
require_once('myfuncs.php');

function getAllUsers() {
    $conn = dbConnect();
    $sqlQuery = "SELECT ID, FIRST_NAME, LAST_NAME FROM activity7_users";
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
    $sqlQuery = "SELECT * FROM activity7_users WHERE FIRST_NAME LIKE '%" . $pattern . "%'";
    $result = $conn->query($sqlQuery);
    if($result->num_rows == 0) {
        return;
    }
    return $result->fetch_all();
    
    $conn->close();
}


// Insert a number of new users into the users table using a prepared statement
function insertUsers() {
    // Create connection
    $conn = dbConnect();
    // Create some Test Users
    $users = array(
        array('Ted', 'Danson', 'pandaBear', '123'),
        array('Joel', 'McCreery', 'user1', 'password'),
        array('Charlise', 'Theron', 'theCharlise', 'The1')
    );
    
    // Create a SQL Insert statement with parameters
    $sql = "INSERT INTO activity7_users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUES (?,?,?,?)"; //.. finish the code
       $stmt = $conn->prepare($sql);
// Loop over all the Test Users, bind the data to the SQL Insert statement, and execute the prepared statement
         for($x=0;$x < count($users);++$x) {
               // Bind the data to the statement and execute the prepared statement
               $stmt->bind_param("ssss", $users[$x][0], $users[$x][1], $users[$x][2], $users[$x][3]);
               $stmt->execute();
          }
// Close the statement and the connection
       $stmt->close();
       $conn->close();
}
?>