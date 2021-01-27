<?php
@session_start();
if (!isset($_SESSION['login'])) :
    header("location:login.php");
endif;
/* config */
require_once '../config.php';
/* header */
require_once 'include/header.php';
/* menu */
require_once 'include/menu.php';

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

require_once 'include/footer.php';
