<?php
/*
 * Project: activity1
 * Module Name: activity1
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This exports the rows of user data as an html table.
 */


// Below -> Safely get Env Vars, per https://secure.php.net/manual/en/function.getenv.php
$user = (getenv('CLEARDB_DATABASE_USER', true) ?: getenv('CLEARDB_DATABASE_USER')) ?: 'root';
$password = (getenv('CLEARDB_DATABASE_PASSWORD', true) ?: getenv('CLEARDB_DATABASE_PASSWORD')) ?: 'root';
$db = (getenv('CLEARDB_DATABASE_DB', true) ?: getenv('CLEARDB_DATABASE_DB')) ?: 'blog';
$host = (getenv('CLEARDB_DATABASE_HOST', true) ?: getenv('CLEARDB_DATABASE_HOST')) ?: 'localhost';

$port = 8889;

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    echo $conn->connect_error;
}

$sqlQuery = "SELECT * FROM activity1_users";

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
