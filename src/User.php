<?php


include_once 'BaseUser.php';
class User extends BaseUser{
    
   protected $city;
   protected $street;
   protected $houseNo ;
   protected $apartmentNo;
   protected $postalCode;
   
   public function __construct() {
       parent::__construct();
       $this->city = "";
       $this->street = "";
       $this->houseNo = "";
       $this->apartmentNo ="";
       $this->postalCode = "";
   }

      
   public function getCity() {
       return $this->city;
   }

   public function getStreet() {
       return $this->street;
   }

   public function getHouseNo() {
       return $this->houseNo;
   }

   public  function getApartmentNo() {
       return $this->apartmentNo;
   }

   public function getPostalCode() {
       return $this->postalCode;
   }

   public function setCity($city) {
       $this->city = $city;
   }

   public function setStreet($street) {
       $this->street = $street;
   }

   public function setHouseNo($houseNo) {
       $this->houseNo = $houseNo;
   }

   public function setApartmentNo($apartmentNo) {
       $this->apartmentNo = $apartmentNo;
   }

   public function setPostalCode($postalCode) {
       $this->postalCode = $postalCode;
   }


public function regiestrUser(){
    //muszą być wypełnione wszystkie pola 
    //e mail musi być zwalidowany i unikalny 
    // login musi być unikalny 
    // kod pocztowy musi być zwalidowany 
    
    // jeśli wszystko się udało wyświetla rejestracja udana i zwraca True
    // jeśli coś nie bangla wyświetla co nie poszło 
    
    $user= new User();
    
//    <input type="text" name="userName" placeholder="podaj nazwę użytkownika"><br>
//    jeśli nazwa użytkownika podana
//          sprawdz czy jest w bazie 
//                jeśli tak message 1 = użytkownik o takim loginie już istnieje
//                jeśl nie User->setusername
//    jeśli nie jest podana messsage 1 = podaj nazwę użytkownika             
//    
//    
//    <input type="text" name="name" placeholder="podaj imię"><br>
//    jeśli imie jest podane user->setName
//    jeśli nie podano message 2 podaj imię
//
//    <input type="text" name="surname" placeholder="podaj nazwisko"><br>
//    jeśli nazwisko podane user->setsurname 
//    jeśli nie message 3 podaj nazwisko
//    
//    
//    <input type="text" name="email" placeholder="podaj e mail"><br>
//    jeśli emai podano 
//           sprawdz czy poprawny 
//                 jeśli tak user->setEmail 
//                 jeśli nie messasge 4 podany e mail jest nieprawidłowy 
//    jeśli nie podano message 4      podaj e mail        
//    <input type="text" name="password" placeholder="podaj hasło"><br>
//    jeśli password podane to user->setpassword;
//    jeśli nie to message 5 podaj hasło
//    <h4>dane adresowe</h4>
//    <input type="text" name="userName" placeholder="podaj miasto"><br>
//    jeśli miasto podane to user-> setCity 
//    jeśli nie message 6 podaj hasło 
//    <input type="text" name="userName" placeholder="podaj ulice"><br>
//    jeśli ulica podana to user->setStreert 
//    jeśli nie message 7 podaj ulice
//    <input type="text" name="userName" placeholder="podaj numer domu"><br>
//    jeśli numer  domu podany to user->setHouseno
//    jeśli nie message 8
//    <input type="text" name="userName" placeholder="podaj numer mieszkania"><br>
//    jeśli numer mieszkania user->set apppartment no 
//    <input type="text" name="userName" placeholder="podaj kod pocztowy"><br>
//    jeśli kod pocztowy podano user->setPostalCode
//    jeśli nie message 9 
//    <input type="submit" name="regiestrForm" value="Zarejestruj"<br>
           
    // zbieramy message do tablicy 
    
    // jeśli tablica pusta dodajemy użytkownika do bazy 
       // jeśli ok przechodzimy na stronę welcome
       // jak nie wyświetlamy komunikat 
    
    // jeśli coś w tablicy jest wyświetlamy  foreachu 
    
    
    
}// koniec regiestr user 







}



