<?php
/*
 * Project: CST-126-Blog-Project v.0.5
 * Module Name: Header v.0.1
 * Author: Daniel Cender
 * Date: March 30, 2019
 * Synopsis: This page fragment displays the search box, the action box, and the profile menu.
 */

require_once '../modules/helpers/funcs.php';
$host  = $_SERVER['HTTP_HOST'];
$urlPrefix = "http://$host/CST-126-Projects/BloggingPlatform/";

// echo '<div class="navbar-fixed">
//     <nav>
//       <div class="nav-wrapper">
//         <a href="#!" class="brand-logo">Logo</a>
//         <ul class="right hide-on-med-and-down">';
// echo '<li><a href="' . $urlPrefix . 'modules/post/newPost.php">New Post</a></li>';
// echo '<li><a href="' . $urlPrefix . 'modules/blog/newBlog.php">New Blog</a></li>';
// if(isAdmin()) {
//     echo '<li><a href="' . $urlPrefix . 'modules/admin.index.php">Admin Console</a></li>';
// }
// echo "</ul>
//       </div>
//     </nav>
//   </div>";
?>


 <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?php echo $urlPrefix;?>modules/post/newPost.php">New Post</a></li>
          <li><a href="<?php echo $urlPrefix;?>modules/blog/newBlog.php">New Blog</a></li>
          <?php if(isAdmin()): ?>
          <li><a href="<?php echo $urlPrefix;?>modules/admin/index.php">Admin Console</a></li>
          <?php endif;?>
        </ul>
      </div>
    </nav>
  </div>