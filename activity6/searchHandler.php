<?php
/*
 * Project: activity6
 * Module Name: activity6 part 2 - searchHandler.php
 * Author: Daniel Cender
 * Date: April 7, 2019
 * Synopsis: This script processes search queries from search.html
 */
require_once('utility.php');

$searchPattern = $_POST['search'];

$users = getUsersByFirstName($searchPattern);

include '_displayUsers.php';
?>