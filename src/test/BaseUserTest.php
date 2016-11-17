<?php

include_once '../BaseUser.php';

class BaseUserTest extends PHPUnit_Framework_TestCase {
 
    public function testIfBaseUserExist(){

        $this->assertTrue(class_exists('BaseUser'), "Klasa BaseUser NIE istnieje");
    }
    
    
    /// sprawdzamy konstruktor 
     public function testBaseUserConstruct(){
     
           
     }
        
  // sprawdamy gettery 
     
     
     
    public function testGetUserId(){
        $user= new BaseUser;
        $this->assertSame($user->getUserId(), -1, "getUserId nie zwraca poprawnej wartości kiedy nie podano ID");
    }  
    
    public function testEmail(){
              $user= new BaseUser;
               $this->assertSame($user->getEmail(),"", "konstruktor nie zerje pola Email");
              $email= 'aaa@aaa.pl';
              $user->setEmail( $email);
              $this->assertSame($user->getEmail(),$email, "Geter lub Seter dla E mail nie działa poprawnie");
              $falseEmail="jkfasjdjnluaksdjfh";
              $user->setEmail($falseEmail);
              $this->assertFalse($user->setEmail($falseEmail), "E mail nie zwraca false przy złym formacie");
              $this->assertSame($user->getEmail(),$email, "Setter zmienia maila mimo niepoprawnego fomatu");
    }  
    
    public function testUserName(){
              $user= new BaseUser;
              $this->assertSame($user->getUserName(),"", "konstruktor nie zeruje pola Username lub getter nie działa poprawnie");
              $usserame= 'dasssafad';
              $user->setUserName( $usserame);
              $this->assertSame($user->getUserName(),$usserame, "Geter lub Seter dla UserName nie działa poprawnie");

    }  
  
    public function testHashedPassword(){
              $user= new BaseUser;
              $this->assertSame($user->getHashedPassword(),"", "konstruktor nie zeruje pola HashedPassword lub geter nie działa popranie ");
              $password = 'dasssafad';
              $hashedPssword = $user->setHashedPassword( $password);
              $this->assertSame($user->getHashedPassword(),$hashedPssword, "Geter lub Seter dla UserName nie działa poprawnie");
              $this->assertNotSame($user->getHashedPassword(),$password, "Setter nie hashuje hasła");
    }
  
 
    
    public function testCheckLogin(){
        
        session_destroy();
        
        $user = new BaseUser();
        $user->checkLogin('aaa@aaa.pl', "nieprawidłowehasło ");
        $this->assertTrue(!isset($_SESSION), "Checklogin nie ustawia sesji");
        $this->assertTrue(!isset($_SESSION['hash']), "Checklogin nie zwraca false przy braku session hash");
        $this->assertTrue(!isset($_SESSION['id']), "Checklogin nie zwraca false przy braku session id");
        $this->assertTrue(!isset($_SESSION['type']), "Checklogin nie zwraca false przy braku session type");
        $this->assertSame($user->checkLogin('aaa@aaa.pl', "nieprawidłowehasło "),'niepraidłowy login lub hasło' );
        
       // jak sesja nie wystartowana wystartować sesję 
       // sprawdzić czy w sesji ustawiona zmienna hash , id type
           // jak nie zwracamy false
           // jak tak 
             // łączymy się z bazą admin
             
             // sprawdzamy czy hash jest właściwy dla danego ID 
             //jak tak ustawiamy w session ID hash i Type na A
                // jak nie łączymy się z tabelą users 
               // sprawdzamy czy hash jest właściwy dla danego ID 
                  // jak tak ustawiamy ID hash i Type na U
               
    }
    
}




