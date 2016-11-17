<?php
///  Base User do poprawienia 
// SQLki 
// Zmienne $session 


// w trakcie
include_once 'Connect.php';

Class BaseUser extends Connect{
     
    protected $userId;
    protected $hashedPassword;
    protected $email;
    protected $username;
    protected $name;
    protected $surname;




    public function __construct() {
      
       $this->userId = -1;
       $this->hashedPassword="";
       $this->email="";
       $this->username="";
       $this->name="";
       $this->surname="";
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
    
    
        public function getName() {
        return $this->name;
    }
    
        public function getSurname() {
        return $this->surname;
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

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

        public function login(){
        session_start();
        $message= "wystąpił błąd";
         if(isset($_SESSION['hash']) && $_SESSION['type']=="U"){   // jeśli UŻYTKOWNIK już się logował 
                $conn=  $this->connectToDB();            
                $sql= 'SELECT hashedPassword FROM `users` WHERE `email`="'.////////////sprawdz sQ
                        ($_SESSION['userInputMail']).'"';
                        $result=$conn->query($sql);
                        $row=$result->fetch_assoc();
                            if($row['hashedPassword']==$_SESSION['hash']){// sprawdz SQL
                             $message=True;
                            }else {
                              session_destroy();
                              $page = "login.php";
                              $sec = "1";
                              header("Refresh: $sec; url=$page");
                              $message="błąd danych logowania. Zaloguj się ponownie ";
                          }
          }  
       if(isset($_SESSION['hash']) && $_SESSION['type']=="A"){   // jeśli ADMIN już się logował 
                $conn=  $this->connectToDB();            
                $sql= 'SELECT hashedPassword FROM `admin` WHERE `email`="'.////////////sprawdz sQ
                        ($_SESSION['userInputMail']).'"';
                        $result=$conn->query($sql);
                        $row=$result->fetch_assoc();
                     if($row['hashedPassword']==$_SESSION['hash']){//sprawdź SQL
                        $message=TRUE;
                     }else {
                         session_destroy();
                         $page = "login.php";
                         $sec = "1";
                         header("Refresh: $sec; url=$page");
                         $message="błąd danych logowania. Zaloguj się ponownie ";
                     }
                
            
        } else {                // jeśli użytkownik się wcześniej nie logował 
                                // sprawdzamy w tabeli userów
          if(isset($_POST['userMail'])&& $_POST['userMail']!=''&& 
               isset($_POST['password'])&& $_POST['password']!=''&&
               filter_var($_POST['userMail'], FILTER_VALIDATE_EMAIL)!=null){
         
               $conn=  $this->connectToDB(); 
               $userInputMail=$conn->real_escape_string($_POST['userMail']);
               $sql='SELECT * FROM `users` where email="'.$userInputMail.'"';
               $result=$conn->query($sql);
               $usr=$result->fetch_assoc();
               $userInputPass=$_POST['password'];
                    if(password_verify (  $userInputPass ,  $usr['hashedPassword'] )){
                       $_SESSION['hash']=$usr['hashedPassword'];
                       $_SESSION['userInputMail']=$_POST['userMail'];
                       $_SESSION['userId']=$usr['id'];
                       $_SESSION['type']='A';

                       $message = TRUE;
               $conn->close();
               $conn= null;
        
                }else{  // jak z tabeli userów nie pasuje to patrzymy na adminów 
                $conn=  $this->connectToDB(); 
                        $userInputMail=$conn->real_escape_string($_POST['userMail']);
                        $sql='SELECT * FROM `users` where email="'.$userInputMail.'"';
                        $result=$conn->query($sql);
                        $usr=$result->fetch_assoc();
                        $userInputPass=$_POST['password'];
                             if(password_verify (  $userInputPass ,  $usr['hashedPassword'] )){
                                $_SESSION['hash']=$usr['hashedPassword'];
                                $_SESSION['userInputMail']=$_POST['userMail'];
                                $_SESSION['userId']=$usr['id'];
                                $_SESSION['type']="U";
                                $message = TRUE;
                        $conn->close();
                        $conn= null;

                         }else{
                        $message = "Wprowadź dane do logowania ";
                         }
                }
            }
            if ($message===TRUE)
            return TRUE; 
            else{
                print "<h1>".$message."</h1>";
                return false;
            }
    } // koniec jeśli uytkownik się wcześniej nie logował
    
    
 }// koniec login
 

}// koniec klasy 
