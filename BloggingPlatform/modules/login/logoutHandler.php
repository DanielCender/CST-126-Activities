<?php
/*
 * Project: CST-126-Blog-Project v.0.8
 * Module Name: LogoutHandler v.0.1
 * Author: Daniel Cender
 * Date: April 13, 2019
 * Synopsis: This script logs out the current user and destroys the current browser session.
 */
session_start();
unset($_SESSION['USER_ID']);
session_destroy();

$host = $_SERVER['HTTP_HOST'];
// header("Location: http://$host/CST-126-Projects/BloggingPlatform/index.php"); exit; // Redirect to main dashboard
echo '<h2 align="center">Successfully Logged out.</h2>';
echo "<script>setTimeout(\"location.href = 'http://$host/CST-126-Projects/BloggingPlatform/index.php';\",1500);</script>";