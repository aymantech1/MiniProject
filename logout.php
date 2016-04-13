<?php
session_start();
unset($_SESSION['username']);
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page
}
?>