<?php
/* Config */
require_once 'config.php';
/* Header */
require_once INC . 'header.php';

/* Pages */
if ($_GET && isset($_GET['page'])) :
	$page = $_GET['page'] . ".php";
	if (file_exists(PAGE . $page)) :
		include_once PAGE . $page;
	else :
		include_once INC . "home.php";
	endif;
else :
	include_once INC . "home.php";
endif;

/* Menu */
require_once INC . 'menu.php';

/* footer  */
require_once INC . 'footer.php';
