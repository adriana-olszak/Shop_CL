<?php

class Message {
    private $id;
    private $messageText;
    private $senderId;
    private $receiverId;
    private $creationDate;
    private $isRead;
    
    public function __construct() {
        $this->id = -1;
        $this->messageText = "";
        $this->senderId = "";
        $this->receiverId = "";
        $this->creationDate = "";
        $this->isRead = "";
    }
    
    public function getId() {
        return $this->id;
    }

    public function getMessageText() {
        return $this->messageText;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getReceiverId() {
        return $this->receiverId;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getIsRead() {
        return $this->isRead;
    }

    public function setMessageText($messageText) {
        $this->messageText = $messageText;
        return $this;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
        return $this;
    }

    public function setReceiverId($receiverId) {
        $this->receiverId = $receiverId;
        return $this;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function setIsRead($isRead) {
        $this->isRead = $isRead;
        return $this;
    }
    
    static public function loadAllSendMessages(mysqli $connection, $senderId) {
        $sql = "SELECT * FROM Messages WHERE id = $id";
        $result = $conncetion->query($sql);
        
        if($result != false && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            $loadedMessage = new Message();
            $loadedMessage->id = $row['id'];
            $loadedMessage->messageText = $row['message_text'];
            $loadedMessage->senderId = $row['sender_id'];
            $loadedMessage->receiverId = $row['receiver_id'];
            $loadedMessage->creationDate = $row['creation_date'];
            $loadedMessage->isRead = $row['is_read'];
            
            return $loadedMessage;
        }
        return null;
    }
    
        static public function loadMessagesByReceiverId (mysqli $conn, $receiverId) {
        $sql = "SELECT * FROM Messages WHERE receiver_id = '$receiverId'ORDER BY creation_date DESC";
        $result = $conn->query($sql);
        $return = [];
        
        if ($result != false && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $receivedMessage = new Message();
                $receivedMessage->id = $row['id'];
                $receivedMessage->senderId = $row['sender_id'];
                $receivedMessage->receiverId = $row['receiver_id'];
                $receivedMessage->message = $row['message'];
                $receivedMessage->creationDate = $row['creation_date'];
                $receivedMessage->isRead = $row['is_read'];
                
                $return[] = $receivedMessage;
            }
            return $messagesByReceiver;
        }
        return $messagesByReceiver;
    }
    
    static public function loadMessagesBySenderId(mysqli $connection, $senderId) {
        $sql = "SELECT * FROM Messages WHERE sender_id = $senderId ORDER BY creation_date DESC";
        $result = $connection->query($sql);
        $return = [];
        
        if($result != false && $result->num_rows != 0) {
            foreach ($result as $row) {
                $sendMessage = new Message();
                $sendMessage->id = $row['id'];
                $sendMessage->messageText = $row['message_text'];
                $sendMessage->senderId = $row['sender_id'];
                $sendMessage->receiverId = $row['receiver_id'];
                $sendMessage->creationDate = $row['creation_date'];
                $sendMessage->isRead = $row['is_read'];
                
                $return[$sendMessage->id] = $sendMessage;
            }
        }
        return $return;
    }
    
        static public function loadMessageById(mysqli $conn, $id) {
        $sql = "SELECT * FROM Messages WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result != false && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            $loadedMessage = new Message();
            $loadedMessage->id = $row['id'];
            $loadedMessage->senderId = $row['sender_id'];
            $loadedMessage->receiverId = $row['receiver_id'];
            $loadedMessage->message = $row['message'];
            $loadedMessage->creationDate = $row['creation_date'];
            $loadedMessage->isRead = $row['is_read'];
            
            return $loadedMessage;
        }
    }
    
        public function saveToDB (mysqli $conn) {
        $sql = "INSERT INTO Message (sender_id, receiver_id, message, creation_date, readed) VALUES ('$this->senderId', '$this->receiverId', '$this->message', '$this->creationDate', '$this->readed')";
        $result = $conn->query($sql);
        if ($result != false) {
            $this->id = $conn->insert_id;
            return true;
        } else {
            return false;
        }
    }
}
?>