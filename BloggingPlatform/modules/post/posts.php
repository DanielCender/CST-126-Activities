<?php
/*
 * Project: CST-126-Blog-Project v.0.4
 * Module Name: BlogPost v.0.2
 * Author: Daniel Cender
 * Date: March 23, 2019
 * Synopsis: This page displays all user posts and reveals actions to tag, update or delete.
 */
require_once('../helpers/session.php');

$userId = getUserId();
// $userId = $_GET['userId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Posts</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h3>Your Posts</h3>
<?php 
include '_getAllPosts.php';
?>
</body>

</html>