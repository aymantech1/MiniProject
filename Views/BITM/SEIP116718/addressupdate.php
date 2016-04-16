<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP116718\Users\Users;
echo "<pre>";
print_r($_POST);
echo "</pre>";


$addressupdate = new Users();
$addressupdate->prepare($_POST)->addressupdate();
