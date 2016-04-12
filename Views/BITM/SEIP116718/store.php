<?php

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
include_once ('../../../vendor/autoload.php');

use App\BITM\SEIP116718\Users\Users;



$store = new Users();

$allstore = $store->prepare($_POST)->storeDataInDatabase();

echo "<pre>";
print_r($allstore);
echo "</pre>";
if(isset($_SESSION['Massage'])){
    echo $_SESSION['Massage'];
    unset($_SESSION['Massage']);
}