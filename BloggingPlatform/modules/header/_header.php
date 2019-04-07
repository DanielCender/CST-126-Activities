<?php
/*
 * Project: CST-126-Blog-Project v.0.5
 * Module Name: Header v.0.1
 * Author: Daniel Cender
 * Date: March 30, 2019
 * Synopsis: This page fragment displays the search box, the action box, and the profile menu.
 */
require('../../config.php');
$host = $_SERVER['HTTP_HOST'];
$urlPrefix = "http://$host/CST-126-Projects/BloggingPlatform/";
?>

<style>
body { 
    padding-top: 65px; 
}
</style>
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo $urlPrefix; ?>main.php">Bloggster</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $urlPrefix;?>modules/post/newPost.php">New Post <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $urlPrefix;?>modules/blog/newBlog.php">New Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $urlPrefix; ?>modules/admin/index.php">Admin</a>
      </li>
    </ul>
  </div>
</nav>