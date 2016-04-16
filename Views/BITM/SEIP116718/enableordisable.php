<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP116718\Users\Users;

$updateEnableDisable = new Users();
$updateEnableDisable->prepare($_POST)->enabledisable();
echo "<pre>";
print_r($_POST);
echo "</pre>";