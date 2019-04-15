<?php
/*
 * Project: CST-126-Blog-Project v.0.8
 * Module Name: Header v.0.3
 * Author: Daniel Cender
 * Date: April 14, 2019
 * Synopsis: This page fragment displays buttons for quick navigation between pages.
 */
$host = $_SERVER['HTTP_HOST'];
$urlPrefix = "http://$host/BloggingPlatform/"; //CST-126-Projects/
session_start();
$shouldShow = isset($_SESSION['USER_ID']);
?>

<style>
body {
	padding-top: 65px;
}
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?php echo $urlPrefix; ?>index.php">Bloggster</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarText" aria-controls="navbarText"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
    <?php if($shouldShow): ?>
      <li class="nav-item"><a class="nav-link"
				href="<?php echo $urlPrefix;?>modules/post/newPost.php">New Blog
					Post</a></li>
     <?php endif; ?>
      <li class="nav-item"><a class="nav-link"
				href="<?php echo $urlPrefix;?>modules/post/posts.php">All Posts</a>
			</li>
      <?php if($shouldShow): ?>
      <li class="nav-item"><a class="nav-link"
				href="<?php echo $urlPrefix; ?>modules/post/yourPosts.php">Your
					Posts</a></li>
			<li class="nav-item"><a class="nav-link"
				href="<?php echo $urlPrefix; ?>modules/admin/index.php">Admin</a></li>
      <?php endif; ?>
      <li class="nav-item"><a class="nav-link"
				href="<?php echo $urlPrefix; ?>modules/search/index.php">Search</a>
			</li>
		</ul>
    <?php if($shouldShow): ?>
     <form
			action="<?php echo $urlPrefix; ?>modules/login/logoutHandler.php"
			class="form-inline my-2 my-lg-0">
			<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Log
				Out</button>
		</form>
    <?php else: ?>
    	<form action="<?php echo $urlPrefix; ?>modules/login/index.html"
			class="form-inline my-2 mx-2 my-lg-0">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log
				In</button>
		</form>
		<form
			action="<?php echo $urlPrefix; ?>modules/registration/index.html"
			class="form-inline my-2 my-lg-0">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Register</button>
		</form>
    <?php endif; ?>
  </div>
</nav>