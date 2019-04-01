<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: helpers v.0.1
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This script includes helper methods for interacting with the global session
 */

// Func starts a PHP session with the user's id
function saveUserId($id) {
    session_start();
    $_SESSION['USER_ID'] = $id;
}

// Func returns ID from PHP session
function getUserId() {
    session_start();
    return $_SESSION['USER_ID'];
}

?>