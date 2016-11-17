<?php
include_once 'BaseUser.php';

class Admin extends BaseUser{
    
   
public function createAdmin(){
    
    // tylko admin może utworzyć nowego admina 
       // jeśli użytkownik nie jest zalogowany jako admin sessiondestroy 
    
//    jeśli jest sprawdamy formularz 
//   
//     protected $hashedPassword;
//    hasło dla admina generujemy automatycznie pierwsze 8 cyfr z md5 z microtime() 
//    setpassword
//    będzie podane po utworzeniu na następnej stronie 
//        //muszą być wypełnione wszystkie pola 
//    //e mail musi być zwalidowany i unikalny 
//    // login musi być unikalny 
//    // kod pocztowy musi być zwalidowany 
//    
//    // jeśli wszystko się udało wyświetla rejestracja udana i zwraca True
//    // jeśli coś nie bangla wyświetla co nie poszło 
//    
//    $user= new User();
//    
////    <input type="text" name="userName" placeholder="podaj nazwę użytkownika"><br>
////    jeśli nazwa użytkownika podana
////          sprawdz czy jest w bazie 
////                jeśli tak message 1 = użytkownik o takim loginie już istnieje
////                jeśl nie User->setusername
////    jeśli nie jest podana messsage 1 = podaj nazwę użytkownika             
////    
////    
////    <input type="text" name="name" placeholder="podaj imię"><br>
////    jeśli imie jest podane user->setName
////    jeśli nie podano message 2 podaj imię
////
////    <input type="text" name="surname" placeholder="podaj nazwisko"><br>
////    jeśli nazwisko podane user->setsurname 
////    jeśli nie message 3 podaj nazwisko
////    
////    
////    <input type="text" name="email" placeholder="podaj e mail"><br>
////    jeśli emai podano 
////           sprawdz czy poprawny 
////                 jeśli tak user->setEmail 
////                 jeśli nie messasge 4 podany e mail jest nieprawidłowy 
////    jeśli nie podano message 4      podaj e mail
//    protected $email;
//    
//    protected $username;
//    protected $name;
//    protected $surname;
}
        
}


