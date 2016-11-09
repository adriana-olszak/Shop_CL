<?php// w trakcie
include_once 'Connect';

Class BaseUser extends Connect{
     
    protected $userId;
    protected $hashedPassword;
    protected $email;
    protected $username;
    
    
    public function __construct() {
      
       $this->id = -1;
       $this->hashedPassword="";
       $this->email="";
       $this->username="";
   }
   
   
    public function getHashedPassword() {
        return $this->hashedPassword;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }
    
    public function setHashedPassword($hashedPassword) {
        $newHashedPassword = password_hash($hashedPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
        return $this->hashedPassword;
    }
    

    public function setEmail($conn, $email) {
        $this->email = $email;
        return true;
    }

    public function setUsername($conn, $username) {
        $this->username = $username;
        return true;
    }

    public function login($conn, $email, $password){
        
    }
    
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

