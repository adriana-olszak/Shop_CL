<?php
abstract class Connect{// gotowe
    
    protected $conn;
    
    public  function connectToDB(){
        $configDB = array(
    'servername' => "localhost",
    'username' => "root",
    'password' => "coderslab",
    'baseName' => "Shop_DB"
);

// Tworzymy nowe połączenie
$conn = new mysqli($configDB['servername'], $configDB['username'], $configDB['password'], $configDB['baseName']);
// Sprawdzamy czy połączcenie się udało
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
    
}else{
    return $conn;
}
    
    
     
    }    
       /// brakuje close connect !!! pytenie czy konieczny?     
}
