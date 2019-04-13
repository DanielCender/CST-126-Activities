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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<?php include('../header/_header.php'); ?>
<h3>Compose Your Latest Post Here</h3>
<form action="post.php" method="POST">
	
	<div class="form_comp">
<div class="form_comp__section">
<label>Title</label>
<input type="text" name="title" value="" onchange="languageFilter(this.value)" required>
</div>

<div class="form_comp__section">
<label>Content</label>
<textarea name="content" onchange="languageFilter(this.value)" required><?php echo $content; ?></textarea>
</div>
<input type="hidden" name="author" value="<?php echo $userId; ?>">
<input type="hidden" name="action" value="save">

<button id="submit_btn" class="btn_submit" type="submit" name="Create New">Create</button>
</div>

</form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>