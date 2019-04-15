<?php
/*
 * Project: CST-126-Blog-Project v.0.4
 * Module Name: BlogPost v.0.2
 * Author: Daniel Cender
 * Date: March 24, 2019
 * Synopsis: This script takes data from a form and creates/edits/deletes a user post.
 */
include "../helpers/db.php";

$conn = dbConnect();
$host = $_SERVER['HTTP_HOST'];

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
// $blog = $_POST['blog']; // Once blogs are built, this will contain id

switch ($_POST['action']) {
    case 'save':
        if (! isset($title) || ! isset($content)) {
            echo 'Post entry is invalid';
            die();
        }
        // Save post to table
        $result = $conn->query("INSERT INTO post(title, author, content) VALUES ('$title', '$author', '$content')");
        if ($conn->error) {
            echo $conn->error;
        }
        header("Location: http://$host/CST-126-Projects/BloggingPlatform/modules/post/posts.php");
        exit(); // Redirect to posts list
        break;
    case 'update':
        if (! isset($title) || ! isset($content)) {
            echo 'Post entry is invalid';
            die();
        }
        $id = $_POST["id"];
        $result = $conn->query("UPDATE post SET Title = '$title', Author = '$author', Content = '$content' WHERE ID = $id");
        if ($conn->error) {
            echo $conn->error;
        }
        header("Location: http://$host/CST-126-Projects/BloggingPlatform/modules/post/yourPosts.php");
        exit(); // Redirect to posts list
        break;
    case 'delete':
        $id = $_POST['id'];
        if ($conn->query("DELETE FROM comment WHERE Post = $id") == TRUE) {
            if ($conn->query("DELETE FROM vote WHERE Post = $id") == TRUE) {
                $conn->query("DELETE FROM post WHERE ID = $id");
            }
        }
        if ($conn->error) {
            echo '<h2 align="center">Post not deleted.</h2>';
            echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/post/yourPosts.php';\",1500);</script>";
        }

        echo '<h2 align="center">Post Deleted Successfully!</h2>';
        echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/modules/post/yourPosts.php';\",1500);</script>";
        // header("Location: http://$host/CST-126-Projects/BloggingPlatform/modules/post/posts.php"); exit; // Redirect to posts list
        break;
    default:
        echo 'no action defined';
}

?>