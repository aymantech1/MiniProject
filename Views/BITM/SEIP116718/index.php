<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP116718\Users\Users;

$oneshow = new Users();
$_POST['id'] = $_SESSION['id'];
$onedataview = $oneshow->prepare($_POST)->index();

//echo "<pre>";
//print_r($onedataview);
//echo "</pre>";
//die();


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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../../html/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../html/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../html/css/normalize.css">
        <link rel="stylesheet" href="../../../html/css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>
        <div class="container top_lay">
            <div class="row">
                <div class="col-md-12 marginfor">
                    <nav class="navbar navbar-default marginfor">
                      <div class="container-fluid marginfor">
                        <div class="navbar-header">
                          <a class="navbar-brand" href="#">MiniProject</a>
                        </div>
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Page 1-1</a></li>
                              <li><a href="#">Page 1-2</a></li>
                              <li><a href="#">Page 1-3</a></li>
                            </ul>
                          </li>
                          <li><a href="#">Page 2</a></li>
                          <li><a href="#">Page 3</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a>Login as :<span style="color:#353300"><b><?php echo " ".$_SESSION['username']?></b></span></a></li>
                            <li><a href="../../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="header_area line_bo">
                    <div class="col-md-9 header_area">
                        <form action="usernameupdate.php" method="post">
                                <div class="form-group">
                                    <label for="f_name"><span style="color: white">First Name</span></label>
                                    <input name="f_name" type="text" class="form-control" id="f_name" value="<?php echo $onedataview['first_name'];?>" >
                                </div>
                                <div class="form-group">
                                    <label for="l_name"><span style="color: white">Last Name</span></label>
                                    <input name="l_name" type="text" class="form-control" id="l_name" value="<?php echo $onedataview['last_name'];?>" >
                                </div>
                                <input type="hidden" name="id" value="<?php echo " ".$_SESSION['id']?>">
                                <button type="submit" class="btn btn-default address_bottom"><b><i>Update Name</i></b></button>
                        </form>
                    </div>
                    <div class="col-md-3 header_area image_area">
                        <div class="profileimage">
                            <img src="../../../html/img/gender.jpg" class="img-rounded ppp" width="220" height="230">
                        </div>
                        <div class="image_update_link">
                            <button type="button" class="btn btn-success widimg"><a href="#"><b><i>Update Profile Pic</i></b></a></button>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="address_phone">
                    <div class="col-md-7">
                        <h1>Address</h1>
                        <form action="addressupdate.php" method="post">
                            <div class="form-group">
                                    <label for="comment">Current Address:</label>
                                    <textarea name="currentAddress"class="form-control" rows="5" id="comment"><?php echo $onedataview['current_address'];?></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                    <label for="comment">Permanent Address:</label>
                                    <textarea name="permanentAddress"class="form-control" rows="5" id="comment"><?php echo $onedataview['permanent_address'];?></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?php echo " ".$_SESSION['id']?>">
                            <button type="submit" class="btn btn-default address_bottom"><b><i>Update Address</i></b></button>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <h1>Phone</h1>
                            <form action="phoneupdate.php" method="post">
                                <div class="form-group">
                                    <label for="personal_Phone">Personal Phone</label>
                                    <input name="personal_phone" type="number" class="form-control" id="personal_Phone" value="<?php echo $onedataview['personal_phone'];?>" >
                                </div>
                                <div class="form-group">
                                    <label for="home_Phone">Home Phone</label>
                                    <input name="home_Phone" type="number" class="form-control" id="home_Phone" value="<?php echo $onedataview['home_phone'];?>" >
                                </div>
                                <div class="form-group">
                                    <label for="office_phone">Office Phone</label>
                                    <input name="office_phone" type="number" class="form-control" id="home_Phone" value="<?php echo $onedataview['office_phone'];?>" >
                                </div>
                                <input type="hidden" name="id" value="<?php echo " ".$_SESSION['id']?>">
                                <button type="submit" class="btn btn-default address_bottom"><b><i>Update Phone Number</i></b></button>
                            </form>
                    </div>
                </div>  
            </div>
        </div>
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
