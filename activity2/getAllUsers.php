<?php
/*
 * Project: activity2
 * Module Name: activity2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This exports the rows of user data as an html table.
 */

$user = 'root';
$password = 'root';
$db = 'activity1';
$host = 'localhost';
$port = 8889;

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    echo $conn->connect_error;
}

$sqlQuery = "SELECT * FROM users";

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
