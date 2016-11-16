
CREATE TABLE User (
    id int AUTO_INCREMENT,
    name varchar(255)NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    post_address varchar(255) NOT NULL,
    PRIMARY KEY(id)
    );
    

CREATE TABLE Admin (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id)
    );
    
    
CREATE TABLE Messages (
    id int AUTO_INCREMENT,
    sender_id int NOT NULL,
    receiver_id int NOT NULL,
    message_text text NOT NULL,
    creation_date date NOT NULL,
    is_read text NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(sender_id) REFERENCES User(id),
    FOREIGN KEY(receiver_id) REFERENCES User(id)
    );
    
    
CREATE TABLE Category (
    id int AUTO_INCREMENT,
    name varchar(255),
    PRIMARY KEY(id)
    );
    
CREATE TABLE Status (
    id int AUTO_INCREMENT,
    name varchar(255),
    PRIMARY KEY(id)
    );
    
    
CREATE TABLE Item (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    price float NOT NULL,
    category_id int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES Category(id)
    );   
    
    
CREATE TABLE Item_Image (
    id int AUTO_INCREMENT,
    item_id int NOT NULL,
    image_source varchar(255),
    PRIMARY KEY (id),
    FOREIGN KEY (item_id) REFERENCES Item(id)
    );
    
    
CREATE TABLE Order(
    id int AUTO_INCREMENT
    user_id int NOT NULL,
    status_id int NOT NULL,
    item_id int NOT NULL,
    item_order_id int NOT NULL,
    payment_type varchar(255) NOT NULL,
    PRIMARY KEY(id)
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (status_id) REFERENCES Status(id),
    FOREIGN KEY (item_id) REFERENCES Item(id)
    );
    
CREATE TABLE Item_Order (
    id int AUTO_INCREMENT,
    user_order_id int NOT NULL,
    item_id int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_order_id) REFERENCES User_Order(id),
    FOREIGN KEY(item_id) REFERENCES Item(id)
    );