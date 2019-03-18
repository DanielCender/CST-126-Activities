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
   include 'modules/helpers/session.php';
   
   $loggedIn = getUserId();
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
</head>
<body>
<div>
<h2><a href="modules/post/newPost.php?userId=<?php echo $loggedIn; ?>">Create Post</a></h2>
</div>
</body>
</html>
