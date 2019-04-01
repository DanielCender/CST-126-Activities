<?php
include 'db.php';
include 'session.php';

function isAdmin() {
    $userId = getUserId();
    $conn = dbConnect();
    
<<<<<<< HEAD
    $result = $conn->query("SELECT * FROM user WHERE RoleID = 2 AND ID = $userId");
=======
    $result = $conn->query("SELECT FROM user WHERE RoleID = 2 AND ID = $userId");
>>>>>>> 65914a641637dfc68a6e908ad86f86b378a90cd2
    if($result->num_rows == 1) {
        return true;
    }
    return false;
}

