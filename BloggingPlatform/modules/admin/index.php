<?php
/*
 * Project: CST-126-Blog-Project v.0.8
 * Module Name: AdminConsole v.0.1
 * Author: Daniel Cender
 * Date: March 30, 2019
 * Synopsis: This page displays lists of users/blog posts for admins to flag, ban, or delete.
 */
require ('../../config.php');
require (DIR_HELPERS . 'db.php');
require (DIR_HELPERS . 'funcs.php');
require (DIR_HELPERS . 'session.php');

$conn = dbConnect();
$userId = getUserId();
// Either 'user' || 'post'
if (isset($_GET['selectionSet'])) {
    $selectionSet = $_GET['selectionSet'];
} else {
    $selectionSet = '';
}

/**
 * Prechecks for any calls to modify either users or posts
 */
if (isset($_GET['deleteID']) && isset($_GET['selectionSet'])) {
    // Perform delete action
    $deleteID = $_GET['deleteID'];
    $deleteQuery = "DELETE FROM $selectionSet WHERE ID = $deleteID";
    if ($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
}

if (isset($_GET['banID']) && isset($_GET['selectionSet'])) {
    // Perform ban action
    $banID = $_GET['banID'];
    $banQuery = "INSERT INTO blacklist (Email) SELECT Email FROM user WHERE ID = $banID";
    if ($conn->query($banQuery) != true) {
        echo $conn->error;
    }
    // Perform delete action after blacklisting complete
    $deleteID = $_GET['banID'];
    $deleteQuery = "DELETE FROM $selectionSet WHERE ID = $deleteID";
    if ($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Console</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body {
	padding-top: 65px;
}
</style>
</head>
<body>
<?php include('../header/_header.php'); ?>
  <div class="container">
		<div class="row">
			<div class="col-sm-4">
				<table class="table">
					<thead>
						<tr>
							<th class="col">Filter</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="index.php?selectionSet=user">Users</a></td>
						</tr>
						<tr>
							<td><a href="index.php?selectionSet=post">Posts</a></td>
						</tr>
					</tbody>
				</table>
			</div>


			<div class="col-sm-8" style="overflow-x: auto;">
				<table class="table">
					<thead>
						<tr>
							<th class="col">
   		<?php
    if ($selectionSet == 'user') {
        echo 'Users';
    } else if ($selectionSet == 'post') {
        echo 'Posts';
    }
    ?>
   		</th>
						</tr>
					</thead>
					<tbody>
      <?php
    if ($selectionSet == 'post') {
        $sqlSelect = "SELECT post.ID, post.Title AS Title, CONCAT(user.FirstName, ' ', user.LastName) AS Name, post.Votes FROM post INNER JOIN user WHERE post.Author = user.ID";
    } else if ($selectionSet == 'user') {
        $sqlSelect = "SELECT ID, CONCAT(FirstName, ' ', LastName) AS Name FROM user WHERE RoleID <> 2";
    }
    $results = $conn->query($sqlSelect);
    while ($item = $results->fetch_assoc()) {
        echo '<tr>';
        echo '<td>';
        echo ($selectionSet == 'post' ? ($item['Title'] . ' - ' . $item['Name'] . ' - ' . $item['Votes']) : ($item['Name']));
        echo '</td>';
        if (($selectionSet == 'post') && strcmp($item['ID'], $userId)) {
            echo '<td>' . '<a href="../post/editPost.php?postId=' . $item['ID'] . '" target="_blank">Edit</a></td>';
        }
        echo '<td>' . '<a href="index.php?deleteID=' . $item['ID'] . '&selectionSet=' . $selectionSet . '">Delete</a></td>';
        if ($selectionSet == 'user') {
            echo '<td>' . '<a href="index.php?banID=' . $item['ID'] . '&selectionSet=' . $selectionSet . '">Ban Permanently</a></td>';
        }

        echo '</tr>';
    }
    ?>
      </tbody>

				</table>

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</body>
</html>
