<?php
/*
 * Project: CST-126-Blog-Project v.0.4
 * Module Name: BlogPost v.0.3
 * Author: Daniel Cender
 * Date: March 24, 2019
 * Synopsis: This fragment exports an unordered list of posts belonging to the user currently logged in.
 */

include "../helpers/db.php";

$conn = dbConnect();

$sqlQuery = "SELECT * FROM post WHERE Author=$userId"; // id passed from posts.php

$resultSet = $conn->query($sqlQuery);

$conn->close();

displayAsTable($resultSet);


function displayAsTable($mysql_response) {
    echo "<ul>";
    while($row = $mysql_response->fetch_assoc()) {
        $id = $row["ID"];
        $title = $row["Title"];
        $votes = $row["Votes"];
        echo "<li><a href='editPost.php?postId=$id'>$title - Votes: $votes</a></li>";
    }
    echo "</ul>";
}
?>
