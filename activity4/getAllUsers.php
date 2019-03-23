<?php
/*
 * Project: activity4
 * Module Name: activity4
 * Author: Daniel Cender
 * Date: March 23, 2019
 * Synopsis: This exports the rows of user data as a multidimensional array.
 */

require_once ('myfuncs.php');

$conn = dbConnect(); // func from myfuncs.php

$sqlQuery = "SELECT ID,FIRST_NAME,LAST_NAME FROM activity4_users";

$resultSet = $conn->query($sqlQuery);

$conn->close();

displayAsTable($resultSet);


function displayAsTable($mysql_response) {
    $array = $mysql_response->fetch_all();
    
    echo "<table align='center'>";
    echo "<tr>";
    while($field = mysqli_fetch_field($mysql_response)) {
        echo "<th>".$field->name."</th>";
    }
    echo "</tr>";
    foreach($array as $row) {
        echo "<tr>";
        foreach($row as $col) {
            echo "<td>".$col."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
