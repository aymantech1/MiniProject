<?php
namespace App\BITM\SEIP116718\Users;
error_reporting(E_ALL ^ E_DEPRECATED);
date_default_timezone_set("Asia/Dhaka");


class Users {
    public $id='';
    public $user_group_id='';
    public $unique_id='';
    public $username='';
    public $password='';
    public $email='';
    public $modified_at='';
    public $created_at='';
    public $delete_at='';
    public $is_active='';
    
    public function __construct() {
        session_start();
        $conn = mysql_connect('localhost', 'root', '') or die("Unable to connect");
        mysql_select_db('miniproject') or die('Unable to connect with DB');
    }
    
    public function prepare($data = ''){
        if(array_key_exists('id', $data)){
            $this->id = $data['id'];
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
        return $this;
    }
    
    public function storeDataInDatabase(){
        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES (NULL, '".$this->username."','".$this->email."','".$this->password."','".date("Y-m-d h:i:sa")."')";
        
        if(mysql_query($query)){
            $_SESSION['Massage'] = "Successfully Done";
        }
        
        else{
            $_SESSION['Massage'] = "Not Done By Me Sorry ";
        }
    }
}