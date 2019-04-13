<?php
/*
 * Project: CST-126-Blog-Project v.0.8
 * Module Name: LogoutHandler v.0.1
 * Author: Daniel Cender
 * Date: April 13, 2019
 * Synopsis: This script logs out the current user and destroys the current browser session.
 */
include_once("../helpers/session.php");

unset($_SESSION['USER_ID']);
session_destroy();

$host  = $_SERVER['HTTP_HOST'];
header("Location: http://$host/CST-126-Projects/BloggingPlatform/index.php"); exit; // Redirect to main dashboard