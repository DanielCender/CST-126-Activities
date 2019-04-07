<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: BlogPost v.0.4
 * Author: Daniel Cender
 * Date: April 6, 2019
 * Synopsis: This HTML Form allows a user to view a blog post in a more aesthetically pleasing page.
 */

require_once '../helpers/session.php';
require_once '../helpers/db.php';

$userId = getUserId();

$postId = $_GET["id"];

$conn = dbConnect();
$post = $conn->query("SELECT post.ID,post.Title,post.Content,post.Votes,CONCAT(user.FirstName, ' ',user.LastName) AS Author FROM post INNER JOIN user WHERE post.Author = user.ID AND post.ID = $postId");

$row = $post->fetch_assoc();

$title = $row["Title"];
$content = $row["Content"];
$author = $row["Author"];
$votes = $row["Votes"];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>View Post</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="../helpers/languageFilter.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<h1 class="display-3 col-md-6 text-center"><?php echo $title; ?></h1>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
	<div class="col-md-3"></div>
		<h4 class="col-md-6 text-center">by <?php echo $author; ?></h4>
		<div class="col-md-3"></div>
	</div>
	<div>
		<div class="col-md-3"></div>
		<p class="col-md-6 text-left"><?php echo $content; ?></p>
		<div class="col-md-3"></div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>