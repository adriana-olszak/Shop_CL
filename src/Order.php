<?php

/**
 * Order class allows to save, edit and load item from database
 *
 * @author adriana Olszak e-mail: adriana.olszak@gmail.com
 * 
 */

include_once 'Connection.php';

class Order extends Connect{

    private $id;
    private $userId;
    private $status;
    private $paymentType;

    public function __construct() {
        $this->id = -1;
        $this->userId = "";
        $this->status = "";
        $this->paymentType = "";
    }

    // -------------------- //
    //        GETERY        //
    // -------------------- //

    function getId() {
        return $this->id;
    }

    function getUserId() {
        return $this->userId;
    }

    function getStatus() {
        return $this->status;
    }

    function getPaymentType() {
        return $this->paymentType;
    }

    
    // -------------------- //
    //        SETERY        //
    // -------------------- //

    function setUserId(int $userId) {
        $this->userId = $userId;
    }

    function setStatus(int $status) {
        $this->status = $status;
    }

    function setPaymentType( int $paymentType) {
        $this->paymentType = $paymentType;
    }


    // -------------------- //
    //      SAVE & EDIT     //
    // -------------------- //

    function saveItemToDataBase(mysqli $conn) {
        if ($this->id == -1) {
// do napisania!            $statement = $conn->prepare("INSERT INTO Items(username, email, hashed_password) VALUES (?, ? ,?)");

            $statement->bind_param('sisii', $this->userId, $this->status, $this->paymentType);


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
    
    
    public function loadAllOrders(mysqli $conn) {
       $sql = "SELECT * FROM Items";
       
       $result = $conn->query($sql);
       
       // uzupełnić poprawnie row!!!!
       if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedItem = new Order();
                $loadedItem->id = $row['id'];
                $loadedItem->= $row[''];
                $loadedItem-> = $row[''];
                $loadedItem-> = $row[''];
                $loadedItem-> = $row[''];
                $loadedItem-> = $row[''];

                $ret[] = $loadedItem;
            }              
        }
        return $ret;
    }
    
    
    // -------------------- //
    //         DELETE       //
    // -------------------- //
       
    public function delete(mysqli $conn) {
        
        $sql = "DELETE FROM `Orders` WHERE id=$this->getId";
        
        $result = $conn->query($sql);
        return $result;
    }
}
