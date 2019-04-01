<?php
/*
 * Project: CST-126-Blog-Project v.0.6
 * Module Name: BlogPost v.0.3
 * Author: Daniel Cender
 * Date: March 31, 2019
 * Synopsis: This page displays all user posts and reveals actions to tag, update or delete.
 */
require_once('../helpers/session.php');
require_once '../helpers/db.php';

if(isset($_GET['action']) & isset($_GET['post'])) {
    $conn = dbConnect();
    $post = $_GET['post'];
    $deleteQuery = "DELETE FROM post WHERE ID = $post";
    if($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
}  

$userId = getUserId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Posts</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h3>Your Posts</h3>
<?php 
include '_getAllPosts.php';
?>
</body>

</html>