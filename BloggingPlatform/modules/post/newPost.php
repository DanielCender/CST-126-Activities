<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: BlogPost v.0.
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This HTML Form allows a user to create or edit a blog post for their blog.
 */

include "../helpers/session.php";

$userId = getUserId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Write A Post</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="../helpers/languageFilter.js"></script>
</head>
<body>

<h3>Compose Your Latest Post Here</h3>
<form action="post.php" method="POST">
	
	<div class="form_comp">
<div class="form_comp__section">
<label>Title</label>
<input type="text" name="title" value="" onchange="languageFilter(this.value)">
</div>

<div class="form_comp__section">
<label>Content</label>
<input type="text" name="content" value="" onchange="languageFilter(this.value)">
</div>
<input type="hidden" name="author" value="<?php echo $userId; ?>">
<input type="hidden" name="action" value="save">

<button id="submit_btn" class="btn_submit" type="submit" name="Create New">Create</button>
</div>

</form>



</body>

</html>