<?php
namespace App\BITM\SEIP116718\Users;
error_reporting(E_ALL ^ E_DEPRECATED);
date_default_timezone_set("Asia/Dhaka");


class Users {
    public $id='';
    public $f_name='';
    public $l_name='';
    public $user_group_id='';
    public $unique_id='';
    public $username='';
    public $password='';
    public $email='';
    public $modified_at='';
    public $created_at='';
    public $delete_at='';
    public $is_active='';
    public $currentAddress='';
    public $permanentAddress='';
    public $personal_phone='';
    public $home_Phone='';
    public $office_phone='';


    public function __construct() {
        session_start();
        $conn = mysql_connect('localhost', 'root', '') or die("Unable to connect");
        mysql_select_db('miniproject') or die('Unable to connect with DB');
    }
    
    public function prepare($data = ''){
        if(array_key_exists('f_name', $data)){
            $this->f_name = $data['f_name'];
        }
        if(array_key_exists('l_name', $data)){
            $this->l_name = $data['l_name'];
        }
        if(array_key_exists('id', $data)){
            $this->id = $data['id'];
        }
        if(array_key_exists('personal_phone', $data)){
            $this->personal_phone = $data['personal_phone'];
        }
        if(array_key_exists('home_Phone', $data)){
            $this->home_Phone = $data['home_Phone'];
        }
        if(array_key_exists('office_phone', $data)){
            $this->office_phone = $data['office_phone'];
        }
        if(array_key_exists('currentAddress', $data)){
            $this->currentAddress = $data['currentAddress'];
        }
        if(array_key_exists('permanentAddress', $data)){
            $this->permanentAddress = $data['permanentAddress'];
        }
        if(array_key_exists('unique_id', $data)){
            $this->unique_id = $data['unique_id'];
        }
        if(array_key_exists('modified_at', $data)){
            $this->modified_at = $data['modified_at'];
        }
        
        if(array_key_exists('created_at', $data)){
            $this->created_at = $data['created_at'];
        }
        
        if(array_key_exists('delete_at', $data)){
            $this->delete_at = $data['delete_at'];
        }
        
        if(array_key_exists('username', $data)){
            $this->username = $data['username'];
        }
        
        if(array_key_exists('password', $data)){
            $this->password = md5($data['password']);
        }
        if(array_key_exists('email', $data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('user_group_id', $data)){
            $this->user_group_id = $data['user_group_id'];
        }
        
        if(array_key_exists('is_active', $data)){
            $this->is_active = $data['is_active'];
        }
        
        return $this;
    }
    
    public function storeDataInDatabase(){
        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES (NULL, '".$this->username."','".$this->email."','".$this->password."','".date("Y-m-d h:i:sa")."')";
        $result = mysql_query($query);
       
        if($result){
            $_SESSION['Massage'] = "Successfully Done";
        }
        
        else{
            $_SESSION['Massage'] = "Not Done By Me Sorry ";
        }
        
    }
    public function insertforkey(){
        
    }

        public function user(){
        $query = "SELECT * FROM `users` WHERE (username='".$this->username."' or email='".$this->username."') and password='".$this->password."' and `is_active` = '1'";
        $result1 = mysql_query($query) or die(mysql_error());
        $result = mysql_fetch_assoc($result1);
        $rows = mysql_num_rows($result1);
        if($rows==1 && $this->username=="admin" || $this->username=="admin@gmail.com")
            {   
                session_start();
                $_SESSION['username'] = "$this->username";
                $_SESSION['id'] = "$this->id";
                header("Location: admin.php"); // Redirect user to index.php
            }
        elseif($rows==1)
            {   
                session_start();
                $_SESSION['username'] = "$this->username";
                $_SESSION['id'] = "$this->id";
                header("Location: index.php"); // Redirect user to index.php
            }
        
        else 
            {
                $home_url = '../../../login.php';
                header('Location: '.$home_url);
            }
   
        $_SESSION['loginname'] = $result['username'];
        $_SESSION['id'] = $result['id'];
        return $result;
    }
    
    public function nameupdate(){
        $query="UPDATE `profiles` SET `first_name` = '".$this->f_name."', `last_name` = '".$this->l_name."'WHERE `profiles`.`user_id` =".$this->id;
        mysql_query($query);
        header('location:index.php');
    }

    public function addressupdate(){
        $query = "UPDATE `profiles` SET `current_address` = '".$this->currentAddress."' ,`permanent_address` = '".$this->permanentAddress."'  WHERE `profiles`.`user_id` =".$this->id;
        mysql_query($query);
        header('location:index.php');
    }
    
    public function phoneupdate(){
        $query = "UPDATE `profiles` SET `personal_phone` = '".$this->personal_phone."' ,`home_phone` = '".$this->home_Phone."', `office_phone` = '".$this->office_phone."' WHERE `profiles`.`user_id` =".$this->id;
        mysql_query($query);
        header('location:index.php');
    }
    
    public function index(){

        $query ="SELECT * FROM `profiles` WHERE user_id =".$this->id;
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $row;
    }
    
    public function allusers(){
        $mydata = array();
        $query = "SELECT * FROM `users";
        $result = mysql_query($query);
        while($row = mysql_fetch_assoc($result)){
            $mydata[] = $row;
        }
        return $mydata;    
    }
    
    public function enabledisable(){
        $query = "UPDATE `users` SET `is_active` = '".$this->is_active."' WHERE `users`.`id` = ".$this->id;
        mysql_query($query);
        header('location:admin.php');
    }
}
