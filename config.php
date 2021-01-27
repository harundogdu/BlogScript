<?php
@session_start();
@ob_start();

define("SITE", "http://localhost/PHP_BlogScript/");
define("ADMIN", "http://localhost/PHP_BlogScript/admin/");
define("PAGE", "page/");
define("CLASS", "class/");
define("INC","include/");

/* Veri Tabanı Bağlantısı */
require_once  'class/Database.php';
$database = new Database();
