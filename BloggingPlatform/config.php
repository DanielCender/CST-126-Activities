<?php
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: config.php v.0.1
 * Author: Daniel Cender
 * Date: April 6, 2019
 * Synopsis: This config file defines folder directory locations for easy includes in all files.
 */

// Root
define('DIR_BASE',      dirname( __FILE__ ) . '/');

// Modules
define('DIR_MODULES',    DIR_BASE . 'modules/');

// Module subs
define('DIR_POST',     DIR_MODULES . 'post/');
define('DIR_SEARCH',      DIR_MODULES . 'search/');
define('DIR_HELPERS',      DIR_MODULES . 'helpers/');
define('DIR_REGISTRATION', DIR_MODULES . 'registration/');
define('DIR_LOGIN', DIR_MODULES . 'login/');
define('DIR_ADMIN', DIR_MODULES . 'admin/');

// Global Fragments
define('VIEW_HEADER',   DIR_MODULES . 'header/_header.php');
// define('VIEW_NAVIGATION',   DIR_MODULES . 'navigation.php');
// define('VIEW_FOOTER',   DIR_MODULES . 'footer.php');


?>