<?php


// w trakcie
include_once 'Connect.php';

Class BaseUser extends Connect{
     
    protected $userId;
    protected $hashedPassword;
    protected $email;
    protected $username;
    
    
    public function __construct() {
      
       $this->userId = -1;
       $this->hashedPassword="";
       $this->email="";
       $this->username="";
   }
   
       public function getUserId() {
        return $this->userId;
    }
   
    public function getHashedPassword() {
        return $this->hashedPassword;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUserName() {
        return $this->username;
    }
    
    public function setHashedPassword($hashedPassword) {
        $newHashedPassword = password_hash($hashedPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
        return $this->hashedPassword;
    }
    

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $this->email = $email;
        return $email;
        }else {
            return false;
        }
    }

    public function setUserName($username) {
        $this->username = $username;
        return $username;
    }

    public function login($conn, $email, $password){
        session_start();
         if(isset($_SESSION['hash'])){
                $conn=getDbConnection();             
                $sql= 'SELECT hashedPassword FROM `users` WHERE `email`="'.////////////sprawdz sQ
                        ($_SESSION['userInputMail']).'"';
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                     if($row['hashedPassword']==$_SESSION['hash']){
                         include_once '../src/main.php';
                         include_once '../src/menu_engine.php';
                     }else {
                         session_destroy();
                        include_once '../src/logIn.php';
                     }
                
            
            } else {
                
            include_once '../src/logIn.php';
            }
    }
    
    
}



