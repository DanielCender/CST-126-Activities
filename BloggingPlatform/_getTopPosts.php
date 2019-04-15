<?php
/*
 * Project: CST-126-Blog-Project v.0.4
 * Module Name: BlogPost v.0.3
 * Author: Daniel Cender
 * Date: March 24, 2019
 * Synopsis: This fragment exports an unordered list of posts belonging to the user currently logged in.
 */
require_once ('config.php');
require (DIR_HELPERS . 'db.php');

$conn = dbConnect();

$sqlQuery = "SELECT * FROM post ORDER BY Votes DESC LIMIT 10"; // Show top ten voted posts

$resultSet = $conn->query($sqlQuery);

displayAsTable($resultSet);
$conn->close();

function displayAsTable($mysql_response)
{
    echo "<h3 style='margin-top:50px'>Top 10 Posts</h3>";
    echo "<ol style='margin-top:50px'>";
    while ($row = $mysql_response->fetch_assoc()) {
        $id = $row["ID"];
        $title = $row["Title"];
        $votes = $row["Votes"];
        echo "<li><a href='modules/post/viewPost.php?id=$id'>$title - Votes: $votes</a></li>";
    }
    echo "</ol>";
}
?>
