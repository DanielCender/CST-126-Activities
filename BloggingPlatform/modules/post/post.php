<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: BlogPost v.0.1
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This script takes data from a form and creates a new post in the
 */
include "../helpers/db.php";

// session_start(); // Open session to as to save variables to the global object

$conn = dbConnect();

if(!isset($_POST['title']) || !isset($_POST['content'])) {
    echo 'Post entry is invalid';
    die();
}

echo " - " . $_POST['title'] . " - " . $_POST['content'] . " - " . $_POST['author'] . " - ";


$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
# $blog = $_POST['blog']; // Once blogs are built, this will contain id

switch($_POST['action']) {
    case 'save':
        //Save post to table
        $results = $conn->query("INSERT INTO post(title, author, content) VALUES ('$title', '$author', '$content')"); 
        if($conn->error) {
            echo $conn->error;
        }
        $row = $results->fetch_assoc();
        print_r($row);
        break;
    case 'update':
        // TODO: Update post func
        break;
    case 'del':
        // TODO: Delete post func
        break;
    default:
        echo 'no action defined';
}



?>