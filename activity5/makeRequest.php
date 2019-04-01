<?php
/*
 * Project: activity5
 * Module Name: activity5 part 1 - makeRequest.php
 * Author: Daniel Cender
 * Date: March 28, 2019
 * Synopsis: This script processes GET requests from part1.php and outputs the request parameters.
 */

$id = $_GET['id'];
$mode = $_GET['mode'];

echo "ID: " . $id;
echo "<br />";
echo "Mode: " . $mode;
?>