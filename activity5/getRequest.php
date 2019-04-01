<?php
/*
 * Project: activity5
 * Module Name: activity5 part 2 - getRequest.php
 * Author: Daniel Cender
 * Date: March 29, 2019
 * Synopsis: This script processes GET requests from part2.php and outputs the request parameters.
 */

$id = $_GET['id'];
$mode = $_GET['mode'];

echo "ID: " . $id;
echo "<br />";
echo "Mode: " . $mode;
?>