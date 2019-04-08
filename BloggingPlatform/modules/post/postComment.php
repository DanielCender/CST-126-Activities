<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: BlogPost v.0.4
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This script takes an XMLHTTP request and creates a new comment on a blog post.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ('../helpers/db.php');
include_once('../helpers/session.php');

// Params from GET Request
$text = $_GET["text"];
$post = $_GET['postId'];

$userId = getUserId();
$conn = dbConnect();

$sql = "INSERT INTO comment(Text,Post,User) VALUES ('" . $text . "'," . $post . "," . $userId . ")";

$conn->query($sql);
if($conn->error) {
    print_r($conn->error);
}

getCurrentComments($conn, $post);




function getCurrentComments($sql, $post) {
    //SELECT comment.Text,CONCAT(user.FirstName, ' ',user.LastName) AS User FROM comment INNER JOIN user WHERE comment.User = user.ID
    $sqlSelect = "SELECT comment.Text,CONCAT(user.FirstName, ' ',user.LastName) AS User FROM comment INNER JOIN user WHERE comment.User = user.ID AND comment.Post = " . $post;
    
    $result = $sql->query($sqlSelect);
    
    $comment_table = "";
    
    while($row = $result->fetch_assoc()) {
        $comment_table = $comment_table . '<div class="row"><div class="col-sm-3"></div><div class="col-sm-6 mx-auto"><div class="card" style="width: 18rem;">
    <div class="card-header">' . $row['User'] . '</div>
    <div class="card-body">
    <p class="card-text">' . $row['Text'] . '</p>
    </div>
    </div>
    </div>
    <div class="col-sm-3"></div>
    </div>';
    }
    echo $comment_table;
}

$conn->close();
?>