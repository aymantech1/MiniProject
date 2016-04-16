<?php
include_once ('../../../vendor/autoload.php');

use App\BITM\SEIP116718\Users\Users;


 if (isset($_POST['usernameoremil']))
    {
        $username = $_POST['usernameoremil'];
        $password = $_POST['password'];
        $username = stripslashes($username);
        $username = mysql_real_escape_string($username);
        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);
    }
$_POST['username'] = $username;
$_POST['password'] = $password;


$user = new Users();

$oneuser = $user->prepare($_POST)->user();
$_SESSION['loginname'] = $oneuser['username'];
echo"<pre>";
print_r($oneuser);
echo"</pre>";
