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


	<nav class="navbar fixed-top navbar-light bg-light">
	<a class="navbar-brand" href="main.php">Bloggster</a>
			<ul class="left">
				<li><a href="<?php echo $urlPrefix;?>modules/post/newPost.php">New
						Post</a></li>
				<li><a href="<?php echo $urlPrefix;?>modules/blog/newBlog.php">New
						Blog</a></li>
				<li><a href="<?php echo $urlPrefix; ?>modules/admin/index.php">Admin</a></li>
				<li>
					<form>
						<div class="input-field">
							<input id="search" type="search" required> <label
								class="label-icon" for="search"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
					</form>
				</li>
			</ul>
			<div>
				
			</div>

	</nav>