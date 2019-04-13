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

<div class="container">
<h3 align="center">Compose Your Latest Post Here</h3>
<div class="row">
<div class="col-lg-3"></div>
<form class="col-lg-6" action="post.php" method="POST">
	
	<div class="">
<label for="title">Title</label>
<div class="input-group mb-3">
<input type="text" name="title" id="title" class="form-control" onchange="languageFilter(this.value)" required>
</div>


<label for="content">Content</label>
<div class="input-group mb-3">
<textarea name="content" id="content" class="form-control" onchange="languageFilter(this.value)" required></textarea>
</div>

<input type="hidden" name="author" value="<?php echo $userId; ?>">
<input type="hidden" name="action" value="save">

<button id="submit_btn" class="btn btn-primary" type="submit" name="Create New">Create</button>
</div>

</form>
<div class="col-lg-3"></div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>