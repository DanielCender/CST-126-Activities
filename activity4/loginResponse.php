<?php
require_once('utility.php');
/*
 * Project: activity4
 * Module Name: activity4
 * Author: Daniel Cender
 * Date: March 23, 2019
 * Synopsis: This script outputs a login response to the browser.
 */
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Login Response</title>
</head>
<body>
	<h2>Login was successful: <?php echo " " . $username ?></h2>
	<a href="whoAmI.php">Who am I</a>
	<?php 
// 	include 'getAllUsers.php';
include '_displayUsers.php';
	?>
</body>
</html>