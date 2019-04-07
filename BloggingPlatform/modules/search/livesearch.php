<?php
/*
 * Project: CST-126-Blog-Project v.0.7
 * Module Name: Search v.0.1
 * Author: Daniel Cender
 * Date: April 6, 2019
 * Synopsis: This script takes an XMLHTTP request and queries the database for posts/users/blogs before returning a table of results.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../helpers/db.php');


$query = "SELECT * FROM ";
//get the filter parameter from URL
$filter = $_GET["filter"];
// get the query text from URL
$text = strip_tags($_GET["text"]);

unset($_GET['filter']); // Hopefully this will work
unset($_GET['text']);
// (!$filter == 'Filter') && (strlen($filter) > 0) && (strlen($text) > 0)
if(1 == 1) {
    echo 'gets in here';
    $conn = dbConnect();
    if($filter == 'post') {
        $query = "SELECT ID,Title,Content,Votes FROM " . $filter . " WHERE MATCH (Title,Content) AGAINST ('" . $text . "' WITH QUERY EXPANSION)";
    } else if ($filter == 'blog') {
        $query = "SELECT ID,Name,Description FROM " . $filter . ' WHERE MATCH (Name,Description)
        AGAINST (' . $text . ' WITH QUERY EXPANSION)';
    } else {
        $query = "SELECT FirstName,LastName,Email FROM " . $filter . ' WHERE MATCH (FirstName,LastName,Email)
        AGAINST (' . $text . ' WITH QUERY EXPANSION)';
    }
    
    $resultSet = $conn->query($query);
    
    if($conn->error) {
        echo $conn->error;
        echo 'No Results';
    }
    
    echo "Got to here";
    
    $arrAll = $resultSet->fetch_all();
    $arrAssoc = $resultSet->fetch_assoc();
    $arrHeaders = $resultSet->fetch_fields();
    
    echo '<table class="table table-hover">';
    echo "<thead>";
    echo "<tr>";
    foreach ($arrHeaders as $row) {
        echo '<th scope="col">' . $row->name . '</th>';
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    foreach($arrAll as $row) {
        echo "<tr>";
        foreach($row as $col) {
            // If the data is a post type and the data being written is a title
            if($filter == 'post' && (array_search($col, $row) == 'Title')) {
                echo '<td><a href="../post/viewPost.php?id=' . $row['ID'] . '">' . $col . '</td>';
            } else if($filter == 'blog' && (array_search($col, $row) == 'Name')) {
                echo '<td><a href="../blog/viewBlog.php?id=' . $row['ID'] . '">' . $col . '</td>';
            } else {
                echo "<td>" . $col . "</td>";
            }
        }
        echo "</a>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    $conn->close();
}
?>