<?php

/**
 * Item Class allows to save, edit and load item from database
 *
 * @author adriana Olszak e-mail: adriana.olszak@gmail.com
 * 
 */

/* DO NAPISANIA METODY (chyba):
 * addTo ShoppingCart
 * removeFromSC
 * modify
 * 
 */
    


include_once 'Connection.php';

class Item extends Connect{

    private $id;
    private $name;
    private $price;
    private $description;
    private $quantity;
    private $category;
    private $imgPath;


    public function __construct() {
        $this->id = -1;
        $this->name = "";
        $this->price = "";
        $this->description = "";
        $this->quantity = "";
        $this->categoryId = "";
        $this->imgPath ="";
    }

    // -------------------- //
    //        GETERY        //
    // -------------------- //

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getDescription() {
        return $this->description;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getCategory() {
        return $this->categoryId;
    }
    
    function getImgPath() {
        return $this->imgPath;
    }

    // -------------------- //
    //        SETERY        //
    // -------------------- //

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setCategory($category) {
        $this->categoryId = $category;
    }

     function setImgPath($imgPath) {
        $this->imgPath = $imgPath;
    }

    // -------------------- //
    //      SAVE & EDIT     //
    // -------------------- //

    function saveItemToDataBase(mysqli $conn) {
        if ($this->id == -1) {
// do napisania!            $statement = $conn->prepare("INSERT INTO Items(username, email, hashed_password) VALUES (?, ? ,?)");

            $statement->bind_param('sisii', $this->name, $this->price, $this->description, $this->quantity, $this->category);


            if ($statement->execute()) {
                $this->id = $statement->insert_id;
                return true;
            } else {
                echo "Problem $statement->error";
            }
            return false;
        } else { // if id > 0 edit the entry
            // napisać SQL

            $result = $conn->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    // -------------------- //
    //         LOAD         //
    // -------------------- //
    
    // uzupełnić poprawnie row!!!!
    public function loadAllItems(mysqli $conn) {
       $sql = "SELECT * FROM Items";
       
       $result = $conn->query($sql);
       
       if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedItem = new Item();
                $loadedItem->id = $row['id'];
                $loadedItem->name= $row['??????'];
                $loadedItem->price = $row['price'];
                $loadedItem->description = $row['description'];
                $loadedItem->quantity = $row['quantity'];
                $loadedItem->categoryId = $row['category_id'];

                $ret[] = $loadedItem;
            }              
        }
        return $ret;
    }
    
    // DO UZUPEŁNIENIA!
    public function loadAllImgByItemId(mysqli $conn, $id) {
        $sql = "SELECT `__SCIEZKA__` FROM `__ZDJECIA__` WHERE item_id=$id";
        
        $result = $conn->query($sql);
        // uzupełnić poprawnie row!!!!
       if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedImg = new Item();
                $loadedImg->id = $row['id'];
                $loadedImg->imgPath = $row['__ścieżka__'];

                $ret[] = $loadedImg;
            }              
        }
        return $ret;
    }

    

    // -------------------- //
    //         DELETE       //
    // -------------------- //
       
    public function delete(mysqli $conn) {
        
        $sql = "DELETE FROM `Items` WHERE id=$this->getId";
        
        $result = $conn->query($sql);
        return $result;
    }
}
