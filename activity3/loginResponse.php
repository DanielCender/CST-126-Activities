<?php
/*
 * Project: activity3
 * Module Name: activity3
 * Author: Daniel Cender
 * Date: March 12, 2019
 * Synopsis: This script outputs a login response to the browser.
 */
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
</body>
</html>