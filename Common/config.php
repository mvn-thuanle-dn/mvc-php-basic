<?php
	// enviroment db;
	define('SERVERNAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'thuan');
	define('DBNAME', 'mysql_exercise_basic');

	// router view
	define('RCOMMON', '/Common/config.php');

	// page name
	define('INDEX', 'Home Page');
	define('BLOG', 'Page Blog');
	define('UBLOG', 'Update Page Blog');

	// local path
	define('ORGINAL_PATH', 'http://localhost/AST_thuanlengoc/php-mvc/MVC/');
	define('CSS', '/Common/assets/style.css');

	// view
	define('V_BLOG', 'View/blog.php');
	define('V_USER', 'View/user.php');
	define('E_BLOG', 'View/edit_detail_blog.php');
	// define('E_USER', 'View/user.php');
	// define('CR_USER', 'View/user.php'); //create user;
	// define('CR_BLOG', 'View/user.php'); //create user;

	// controller
	define('C_BLOG', 'Controller/blog/BlogController.php');
	define('C_USER', 'Controller/user/UserController.php');
