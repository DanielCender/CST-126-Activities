<!-- 
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: BlogPost v.0.1
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This page is served only when user has been authenticated through login.
 */
 -->
 
 <?php 
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
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
<div>
<h2><a href="modules/search/index.php">Search Posts</a></h2>
<h2><a href="modules/post/newPost.php">Create Post</a></h2>
<h2><a href="modules/post/posts.php">View All Posts</a></h2>
<h2><a href="modules/admin/index.php">Admin Console</a></h2>
</div>
<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
