<?php
/*
 * Project: activity3
 * Module Name: activity3
 * Author: Daniel Cender
 * Date: March 11, 2019
 * Synopsis: This exports the rows of user data as an html table.
 */

include 'myfuncs.php';

$conn = dbConnect(); // func from myfuncs.php

$sqlQuery = "SELECT * FROM activity3_users";

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
