<?php
include 'db.php';
include 'session.php';

function isAdmin() {
    $userId = getUserId();
    $conn = dbConnect();
    
    $result = $conn->query("SELECT FROM user WHERE RoleID = 2 AND ID = $userId");
    if($result->num_rows == 1) {
        return true;
    }
    return false;
}

