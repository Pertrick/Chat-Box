<?php

session_start();

class User{

    private $cookie_username = "username";

    private $cookie_email = 'email';

    private $cookie_password = "password";
 
    public function registerUser($username, $email, $password){

        $cookie_username_value = $username;

        $cookie_email_value = $email;

        $cookie_password_value = $password;
  

        if(isset($cookie_username_value) && isset($cookie_email_value) && isset($cookie_password_value)){
           
            setcookie($this->cookie_username, $cookie_username_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($this->cookie_email, $cookie_email_value, time() + (86400 * 30), "/");
            setcookie($this->cookie_password, $cookie_password_value, time() + (86400 * 30), "/");


            return true;
        }else{
           return false;
        }

     
}

    public function checkLogin($email, $password){

        if($_COOKIE[$this->cookie_email] == $email && $_COOKIE[$this->cookie_password] == $password){
            $_SESSION['login'] = true;
            $_SESSION['uid'] = 1;

            return true;
        }
      
    }
    
    public function getId(){
        
        
            if(isset($_SESSION['login']) && isset($_SESSION['uid']) && isset($_COOKIE[$this->cookie_username])){
            
                $id = $_SESSION['uid'];
                return $id;
            } else{
                return;
            } 
               
    }

    public function getUsername($id){
        
        if($id){
            if(isset($_SESSION['login']) && isset($_COOKIE[$this->cookie_username]) )
            
                return ucfirst($_COOKIE[$this->cookie_username]);
            }  
               
    }



    public function getEmail($id){
        if($id){
            if(isset($_SESSION['login']) && isset($_COOKIE[$this->cookie_email]) )
            
                return ucfirst($_COOKIE[$this->cookie_username]);
            }  
    }

    public function get_session(){
        if(isset($_SESSION['login'])){
            return true;
        }
         return false;
    }
    
        public function user_logout() {
                 unset($_SESSION['login']);
                 unset($_SESSION['uid']);
                 unset($_SESSION['user']);

			
                }
        
}