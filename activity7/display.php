<?php
/*
 * Project: activity7
 * Module Name: activity7 part 1 - display.php
 * Author: Daniel Cender
 * Date: April 9, 2019
 * Synopsis: This script runs an insert of new users and displays them in a table.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('utility.php');


insertUsers();

// $users = getUsersByFirstName($searchPattern);
$users = getAllUsers();


include '_displayUsers.php';
?>