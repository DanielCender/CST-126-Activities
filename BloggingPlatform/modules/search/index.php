<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: Search v.0.1
 * Author: Daniel Cender
 * Date: April 2, 2019
 * Synopsis: This page serves a search bar and listing of returned items.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$urlPrefix = "http://$host/CST-126-Projects/BloggingPlatform/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>

<!--  HEADER START  -->
	<nav class="navbar navbar-light bg-light">
		<div class="nav-wrapper">
			<ul class="left">
				<li><a href="<?php echo $urlPrefix;?>modules/post/newPost.php">New
						Post</a></li>
				<li><a href="<?php echo $urlPrefix;?>modules/blog/newBlog.php">New
						Blog</a></li>
				<li><a href="<?php echo $urlPrefix; ?>modules/admin/index.php">Admin</a></li>
			</ul>
			<div>
				
			</div>

		</div>
	</nav>
<!--  HEADER END -->

<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-9">
<form class="form-inline" onSubmit="return false">
  <select class="form-control" id="filterSelector" name="Filter" required>
  <option value="filter">Filter</option>
  <option value="post">Posts</option>
  <option value="blog">Blogs</option>
  <option value="user">Users</option>
</select>
    <input type="text" class="form-control" onkeyup="searchForData()" id="searchText" aria-describedby="searchQuery" placeholder="Enter search">
    <!-- <button type="submit" class="btn btn-primary mb-2" onClick="searchForData()">Search</button> -->
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>

<!-- CONTAINER FOR RETURNED LIVE SEARCH RESULTS -->
<div id="livesearch" class="container">
</div>

<script>
function searchForData() {
	var selector = document.getElementById("filterSelector");
	var filter = selector.options[selector.selectedIndex].value;
	var text = document.getElementById("searchText").value;

	console.log(filter);
	if(filter.length == 0 && text.length == 0) {
		return;
	}

	//	If there are values to be queried
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	xmlhttp.onreadystatechange = function() {
	    if (this.readyState==4 && this.status==200) {
	      document.getElementById("livesearch").innerHTML=this.responseText;
	      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	    }
	  }
	  var httpURL = "livesearch.php?filter=" + filter + "&text=" + text;
	  xmlhttp.open("GET", httpURL, true);
	  xmlhttp.send();
}
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
