<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: BlogPost v.0.4
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This script takes an XMLHTTP request and upvotes the blog post.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ('../helpers/db.php');
include_once('../helpers/session.php');

// Params from GET Request
$postId = $_GET["postId"];

$userId = getUserId();
$conn = dbConnect();

$hasAlreadyVoted = $conn->query("SELECT * FROM vote WHERE Post = " . $postId . " AND User = " . $userId);

if($hasAlreadyVoted->num_rows > 0) {
    getCurrentVotes($conn, $postId);
} else {
    $query = "UPDATE post SET Votes = Votes+1 WHERE ID = " . $postId;
    $result = $conn->query($query);
    
    if ($conn->error) {
        print_r($conn->error);
        $conn->close();
        die;
    }
    
    $conn->query("INSERT INTO vote (Post,User) VALUES(" . $postId . "," . $userId . ")");
    
    if($conn->error) {
        print_r($conn->error);
    }
    getCurrentVotes($conn, $postId);
}


function getCurrentVotes($sql, $post) {
$result = $sql->query("SELECT Votes FROM post WHERE ID = " . $post);

$row = $result->fetch_assoc();

echo $row['Votes'];
}

$conn->close();
?>