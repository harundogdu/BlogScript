<?php $lastSettings = $database->getData("settings"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <base href="<?= $lastSettings['settings_base'] ?>">   
    <meta name="author" content="<?= $lastSettings['settings_author'] ?>">
    <meta name="keywords" content="<?= $lastSettings['settings_keyw'] ?>">
    <meta name="description" content="<?= $lastSettings['settings_desc'] ?>">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="mdi-font/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" id="extra-fonts-css" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext" type="text/css" media="all">
<!--     <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(function() {
            $(".footer-nav ul.footer li:last").css({
                border: "0"
            });
            $("#pop ul.footer li:last").css({
                border: "0"
            });
        });
    </script>
    <!-- Sweet Alert -->
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <div id="logo">
                <a href="homepage.html" id="logoLink"><?= $lastSettings['settings_blogTitle'] ?></a>
            </div>
            <nav>
                <ul>
                    <li><a href="homepage.html" class="mdi mdi-home-circle" title="Anasayfa"> Home</a></li>
                    <li><a href="about.html" class="mdi mdi-account-circle" title="Hakkımda"> About</a></li>
                    <li><a href="contact.html" class="mdi mdi-email" title="İletişim"> Contact</a></li>
                </ul>
            </nav>
            <div style="clear:both;"></div>
        </div>
    </header>
    <div id="columns" class="container">