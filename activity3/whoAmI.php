<?php
/*
 * Project: activity3
 * Module Name: activity3
 * Author: Daniel Cender
 * Date: March 12, 2019
 * Synopsis: This script returns a web page that displays the id of the currently logged-in user.
 */
require_once('myfuncs.php');
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<title>Who Am I</title>
</head>
<body>
<h2>Hello My User ID is: <?php echo " ".getUserId() ?></h2><br />
</body>
</html>