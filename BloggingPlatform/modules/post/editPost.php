<?php
/*
 * Project: CST-126-Blog-Project v.0.4
 * Module Name: BlogPost v.0.3
 * Author: Daniel Cender
 * Date: March 24, 2019
 * Synopsis: This HTML Form allows a user to edit or delete a blog post for their blog.
 */

require_once '../helpers/session.php';
require_once '../helpers/db.php';

$userId = getUserId();
$postId = $_GET["postId"];

$conn = dbConnect();
$post = $conn->query("SELECT * FROM post WHERE ID = $postId");

$row = $post->fetch_assoc();

$title = $row["Title"];
$content = $row["Content"];
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Post</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="../helpers/languageFilter.js"></script>
</head>
<body>

<form action="post.php" method="POST">
	
	<div class="form_comp">
<div class="form_comp__section">
<label>Title</label>
<input type="text" name="title" value="<?php echo $title; ?>" onchange="languageFilter(this.value)">
</div>

<div class="form_comp__section">
<label>Content</label>
<input type="text" name="content" value="<?php echo $content; ?>" onchange="languageFilter(this.value)">
</div>
<input type="hidden" name="author" value="<?php echo $userId; ?>">
<input type="hidden" name="id" value="<?php echo $postId; ?>">

<button id="submit_btn" class="btn_submit" type="submit" name="action" value="update">Update</button>
<button class="btn_submit" type="submit" name="action" value="delete">Delete</button>
</div>
</form>
</body>

</html>