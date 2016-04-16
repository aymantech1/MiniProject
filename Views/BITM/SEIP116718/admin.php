<?php
include_once ('../../../vendor/autoload.php');
use App\BITM\SEIP116718\Users\Users;

$alluser = new Users();
$alluserdata = $alluser->allusers();
//if($_SESSION['username']!=="admin" || $_SESSION['username']!=="admin@gmail.com"){
//    $home_url = '../../../login.php';
//    header('Location: '.$home_url);
//    exit();
//}

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
                            <li><a>Login as :<span style="color:#1BA261"><b><?php echo "Admin"?></b></span></a></li>
                            <li><a href="../../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container top_lay">
            <div class="row">
                <div class="col-md-12 marginfor">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><span style="color: white">Serial</span></th>
                                <th><span style="color: white">ID</span></th>
                                <th><span style="color: white">Name</span></th>
                                <th><span style="color: white">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($alluserdata) && !empty($alluserdata)){
                                   $serial = 0;
                                    foreach($alluserdata as $row){
                                       $serial++;
                                       ?>
                                       <tr>
                                            <td><span style="color: white"><?php echo $serial?></span></td>
                                            <td><span style="color: white"><?php echo $row['id']?></span></td>
                                            <td><span style="color: white"><?php echo $row['username']?></span></td>
                                            <td>
                                                <form action="enableordisable.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                    <input type="hidden" name="is_active" value="<?php echo $row['is_active']?>">
                                                    
                                                    <?php
                                                        if($row['is_active']==0){
                                                            ?>
                                                            <input type="hidden" name="is_active" value="1">
                                                            <button type="submit" class="btn btn-success">Enable</button>
                                                            <?php
                                                        }
                                                        
                                                        elseif($row['is_active']==1){?>
                                                            <input type="hidden" name="is_active" value="0">
                                                            <button type="submit" class="btn btn-danger">Disable</button><?php
                                                        }
                                                    ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                   <tr>
                                          <td colspan="4"><?php echo "No data available";?></td>
                                   </tr>
                                   <?php
                                }
                                   ?>
<!--                            <tr>
                                
                                <td>
                                    <a href="#"><button type="button" class="btn btn-success">Enable</button></a> |
                                    <a href="#"><button type="button" class="btn btn-danger">Disable</button></a>
                                </td>
                            </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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