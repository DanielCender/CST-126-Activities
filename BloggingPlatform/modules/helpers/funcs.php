<?php
/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: helpers v.0.2
 * Author: Daniel Cender
 * Date: March 31, 2019
 * Synopsis: This script includes general purpose helper methods.
 * TODO: Fix bugs that occur when including this file in another script...
 */

include_once(URL_PREFIX . "modules/helpers/db.php");
include_once(URL_PREFIX . "modules/helpers/session.php");

function isAdmin() {
    $userId = getUserId();
    echo $userId;
    $conn = dbConnect();
    
    $result = $conn->query("SELECT * FROM user WHERE RoleID = 2 AND ID = $userId");
    if($result->num_rows == 1) {
        return true;
    }
    return false;
}
?>