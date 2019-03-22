<!-- 
/*
 * Project: CST-126-Blog-Project v.0.2
 * Module Name: UserRegistration v.0.2
 * Author: Daniel Cender
 * Date: March 10, 2019
 * Synopsis: This HTML file is the entry point into the blogging platform web app. It links to the other top level modules of the application.
 */
 -->
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Blogging Platform</title>
</head>
<body>
<div>
<h2><a href="modules/registration/index.html">Register</a></h2>
<h2><a href="modules/login/index.html">Login</a></h2>
<h1><?php echo $_SERVER['SERVER_ADDR'];?></h1>
<h1><?php echo $_SERVER['HTTP_HOST'];?></h1>
<h1><?php echo $_SERVER['HTTP_USER_AGENT'];?></h1>
</div>
</body>
</html>
