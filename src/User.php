<?php


include_once 'BaseUser.php';
class User extends BaseUser{
    
   protected $city;
   protected $street;
   protected $houseNo ;
   protected $apartmentNo;
   protected $postalCode;
   
   public function __construct($city, $street, $houseNo, $apartmentNo, $postalCode) {
       parent::__construct();
       $this->city = $city;
       $this->street = $street;
       $this->houseNo = $houseNo;
       $this->apartmentNo = $apartmentNo;
       $this->postalCode = $postalCode;
   }

      
   function getCity() {
       return $this->city;
   }

   function getStreet() {
       return $this->street;
   }

   function getHouseNo() {
       return $this->houseNo;
   }

   function getApartmentNo() {
       return $this->apartmentNo;
   }

   function getPostalCode() {
       return $this->postalCode;
   }

   function setCity($city) {
       $this->city = $city;
   }

   function setStreet($street) {
       $this->street = $street;
   }

   function setHouseNo($houseNo) {
       $this->houseNo = $houseNo;
   }

   function setApartmentNo($apartmentNo) {
       $this->apartmentNo = $apartmentNo;
   }

   function setPostalCode($postalCode) {
       $this->postalCode = $postalCode;
   }











}



