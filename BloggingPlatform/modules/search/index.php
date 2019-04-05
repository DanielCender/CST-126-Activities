<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: Search v.0.1
 * Author: Daniel Cender
 * Date: April 2, 2019
 * Synopsis: This page serves a search bar and listing of returned items.
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$host = $_SERVER['HTTP_HOST'];
include_once ("http://$host/CST-126-Projects/BloggingPlatform/modules/helpers/funcs.php");
$urlPrefix = "http://$host/CST-126-Projects/BloggingPlatform/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search</title>
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet"
	href="../../css/materialize.min.css" media="screen,projection" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style>
.nav-wrapper, .nav-wrapper form, .nav-wrapper form .input-field { height: 100%; }
</style>
</head>
<body>
<?php include("../header/_header.php"); ?>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>
