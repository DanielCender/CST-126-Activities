<?php
/*
 * Project: CST-126-Blog-Project v.0.6
 * Module Name: BlogPost v.0.3
 * Author: Daniel Cender
 * Date: March 31, 2019
 * Synopsis: This page displays all user posts and reveals actions to tag, update or delete.
 */
require('../../config.php');
require('../helpers/session.php');
require('../helpers/db.php');

if(isset($_GET['action']) & isset($_GET['post'])) {
    $conn = dbConnect();
    $post = $_GET['post'];
    $deleteQuery = "DELETE FROM post WHERE ID = $post";
    if($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
}  
$userId = getUserId();

echo VIEW_HEADER;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Posts</title>
<link rel="stylesheet" type="text/css" href="../../style.css">
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"
	media="screen,projection" />

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body>
<?php include(VIEW_HEADER); ?>
<h3>Your Posts</h3>
<?php include '_getAllPosts.php'; ?>

<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>

</html>