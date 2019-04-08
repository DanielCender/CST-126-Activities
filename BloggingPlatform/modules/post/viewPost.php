<?php
/*
 * Project: CST-126-Blog-Project v.0.8
 * Module Name: BlogPost v.0.5
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This HTML Form allows a user to view a blog post in a more aesthetically pleasing page, vote, and comment.
 */

// require_once '../helpers/session.php';
// require_once '../helpers/db.php';
require('../../config.php');
require(DIR_HELPERS . 'session.php');
require(DIR_HELPERS . 'db.php');

$userId = getUserId();

$postId = $_GET["id"];

$conn = dbConnect();
$post = $conn->query("SELECT post.ID,post.Title,post.Content,post.Votes,CONCAT(user.FirstName, ' ',user.LastName) AS Author FROM post INNER JOIN user WHERE post.Author = user.ID AND post.ID = $postId");
$comments = $conn->query("SELECT comment.Text,CONCAT(user.FirstName, ' ',user.LastName) AS User FROM comment INNER JOIN user WHERE comment.User = user.ID AND comment.Post = " . $postId);

$row = $post->fetch_assoc();

$id = $row['ID'];
$title = $row["Title"];
$content = $row["Content"];
$author = $row["Author"];
$votes = $row["Votes"];


$comment_table = "";

while($row = $comments->fetch_assoc()) {
    $comment_table = $comment_table . '<div class="row"><div class="col-sm-3"></div><div class="col-sm-6 mx-auto"><div class="card" style="width: 18rem;">
    <div class="card-header">' . $row['User'] . '</div>
    <div class="card-body">
    <p class="card-text">' . $row['Text'] . '</p>
    </div>
    </div>
    </div>
    <div class="col-sm-3"></div>
    </div>';
}

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
<?php include(VIEW_HEADER); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<h1 class="display-3 col-md-6 text-center"><?php echo $title; ?></h1>
		<span id="postId" style="display:none"><?php echo $id;?></span>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
	<div class="col-md-3"></div>
		<h4 class="col-md-6 text-center">by <?php echo $author; ?></h4>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<p class=""><?php echo $content; ?></p>
		</div>
		<div class="col-md-3">
		<button type="button" class="btn btn-primary" onClick="upVote()">
  Votes <span id="votes" class="badge badge-light"><?php echo $votes;?></span>
  <span class="sr-only">upvotes</span>
</button>
		
		</div>
	</div>
	
	<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
	<form onSubmit="">
		<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Leave a comment</span>
  </div>
  <textarea class="form-control" onchange="languageFilter(this.value)" id="comment" aria-label="With textarea"></textarea>
</div>
		<button type="button" id="submit_btn" onclick="saveComment()" class="btn btn-outline-primary">Submit</button>
		</form>
	</div>
	<div class="col-sm-3"></div>
	</div>
	
	<div id="comments">
	<!--  INCLUDE ALL COMMENTS ON THIS POST -->
	<?php echo $comment_table;?>
	</div>
</div>

<script>
function upVote() {
var postId = document.getElementById("postId").innerHTML;
//	If there are values to be queried
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
} else {  // code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("votes").innerHTML=this.responseText;
    }
  }
  var httpURL = "upVote.php?postId=" + postId;
  xmlhttp.open("GET", httpURL, true);
  xmlhttp.send();
}

function saveComment() {
	var commentText = document.getElementById("comment").value;
	console.log(commentText);
	var postId = document.getElementById("postId").innerHTML;
	
	if(commentText.length == 0) {
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
	      document.getElementById("comments").innerHTML=this.responseText;
	    }
	  }
	  var httpURL = "postComment.php?text=" + commentText + "&postId=" + postId;
	  xmlhttp.open("GET", httpURL, true);
	  xmlhttp.send();
}

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>