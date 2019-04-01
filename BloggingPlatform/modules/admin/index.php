<?php
/*
 * Project: CST-126-Blog-Project v.0.5
 * Module Name: AdminConsole v.0.1
 * Author: Daniel Cender
 * Date: March 30, 2019
 * Synopsis: This page displays lists of users/posts/blogs for admins to flag, ban, or delete.
 */

require_once '../helpers/db.php';
<<<<<<< HEAD
require_once '../helpers/funcs.php';

// if(!isAdmin()) {
//     exit('You are unauthorized to view this page. Please ask your system administrator for permission.');
// }
=======
>>>>>>> 65914a641637dfc68a6e908ad86f86b378a90cd2

$conn = dbConnect();

// Either 'user' || 'post'
if (isset($_GET['selectionSet'])) {
    $selectionSet = $_GET['selectionSet'];
} else {    
$selectionSet = '';
}

<<<<<<< HEAD
/**
 * Prechecks for any calls to modify either users or posts
 */
=======
>>>>>>> 65914a641637dfc68a6e908ad86f86b378a90cd2
if (isset($_GET['deleteID']) && isset($_GET['selectionSet'])) {
    // Perform delete action
    $deleteID = $_GET['deleteID'];
    $deleteQuery = "DELETE FROM $selectionSet WHERE ID = $deleteID";
    if($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
}

if (isset($_GET['banID']) && isset($_GET['selectionSet'])) {
    // Perform ban action
    $banID = $_GET['banID'];
    $banQuery = "INSERT INTO blacklist (Email) SELECT Email FROM user WHERE ID = $banID";
    if($conn->query($banQuery) != true) {
        echo $conn->error;
    }
<<<<<<< HEAD
    // Perform delete action after blacklisting complete
    $deleteID = $_GET['banID'];
    $deleteQuery = "DELETE FROM $selectionSet WHERE ID = $deleteID";
    if($conn->query($deleteQuery) != true) {
        echo $conn->error;
    }
=======
>>>>>>> 65914a641637dfc68a6e908ad86f86b378a90cd2
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Console</title>
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"
	media="screen,projection" />

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body>

  <div class="row">
      <div class="col s6">
      Filter
      <table>
      <thead>
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
      
      
      <div class="col s6">
      <table>
      <thead>
   		<?php 
   		if($selectionSet == 'user') {
   		    echo 'Users';
   		} else if ($selectionSet == 'post') {
   		    echo 'Posts';
   		}
   		?>
   		</thead>
   		<tbody>
      <?php 
      if($selectionSet == 'post') {
        $sqlSelect = "SELECT post.ID, post.Title AS Title, CONCAT(user.FirstName, ' ', user.LastName) AS Name, post.Votes FROM post INNER JOIN user WHERE post.Author = user.ID";
      } else if ($selectionSet == 'user') {
          $sqlSelect = "SELECT ID, CONCAT(FirstName, ' ', LastName) AS Name FROM user WHERE RoleID <> 2";
      }
        $results = $conn->query($sqlSelect);
        while($item = $results->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            echo ($selectionSet == 'post' ? ($item['Title'] . ' - ' . $item['Name'] . ' - ' . $item['Votes']) : ($item['Name']));
            echo '</td>';
            echo '<td>' . '<a href="index.php?deleteID=' . $item['ID'] . '&selectionSet=' . $selectionSet . '">Delete</a></td>';
            if($selectionSet == 'user') {
                echo '<td>' . '<a href="index.php?banID=' . $item['ID'] . '&selectionSet=' . $selectionSet . '">Ban Permanently</a></td>';
            }
            
            echo '</tr>';
        }
      ?>
      </tbody>
      
      </table>
      
      </div>
    </div>

<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>