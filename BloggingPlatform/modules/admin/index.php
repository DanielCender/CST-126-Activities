<?php
/*
 * Project: CST-126-Blog-Project v.0.5
 * Module Name: AdminConsole v.0.1
 * Author: Daniel Cender
 * Date: March 30, 2019
 * Synopsis: This page displays lists of users/posts/blogs for admins to flag, ban, or delete.
 */

require_once '../helpers/db.php';

$conn = dbConnect();

// Either 'user' || 'post'
if (isset($_GET['selectionSet'])) {
    $selectionSet = $_GET['selectionSet'];
} else {    
$selectionSet = '';
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
        $sqlSelect = "SELECT post.Title AS Title, CONCAT(user.FirstName, ' ', user.LastName) AS Name, post.Votes FROM post INNER JOIN user WHERE post.Author = user.ID";
      } else if ($selectionSet == 'user') {
          $sqlSelect = "SELECT CONCAT(FirstName, ' ', LastName) AS Name FROM user";
      }
        $results = $conn->query($sqlSelect);
        while($item = $results->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            echo $item['Title'] . ' - ' . $item['Name'] . ' - ' . $item['Votes'];
            echo '</td>';
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