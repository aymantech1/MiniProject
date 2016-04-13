<?php
session_start();
if(!isset($_SESSION["username"]) and empty($_SESSION['username'])){
    $home_url = '../../../login.php';
    header('Location: '.$home_url);
exit(); }

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        
        <link rel="stylesheet" href="../../../html/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../html/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../html/css/normalize.css">
        <link rel="stylesheet" href="../../../html/css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <ul>
            <li><a href="../../../logout.php">Logout</a></li>
        </ul>
        <h1>Login</h1>
        <?php
           
            echo  $_SESSION['username'];
        ?>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="html/js/bootstrap.min.js"></script>
        <script src="html/js/plugins.js"></script>
        <script src="html/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
