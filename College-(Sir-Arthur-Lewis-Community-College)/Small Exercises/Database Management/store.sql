CREATE DATABASE Store IF NOT EXISTS;

USE Store;

CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(100),
    price DECIMAL(10,2),
    stock_quantity INT
);

CREATE TABLE product_log (
    log_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    action VARCHAR(50),
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE inventory_changes (
    change_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    old_quantity INT,
    new_quantity INT,
    change_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    quantity INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);



DELIMITER //

CREATE TRIGGER after_product_insert
AFTER INSERT ON products

FOR EACH ROW 

BEGIN

INSERT INTO product_log(product_id, action, log_time)
Values (NEW.product_id, 'New Product Added', NOW());
END;
//

INSERT INTO `products`(`product_name`, `price`, `stock_quantity`) 
VALUES ('Laptop', 2500, 30)



inventory_update
products
before
UPDATE

BEGIN
IF OLD.stock_quantity <> NEW.stock_quantity THEN
INSERT INTO inventory_changes(product_id, old_quantity, new_quantity, change_time)
Values (OLD.product_id, OLD.stock_quantity, NEW.stock_quantity, NOW());
END IF;
END;

UPDATE `products` 
SET `stock_quantity`=20 
WHERE product_id = 1;



order_delete
orders
before
DELETE

BEGIN

SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Orders cannot be deleted';

END;

INSERT INTO `orders`(`order_id`, `quantity`, `order_date`) VALUES (1, 1, NOW());

DELETE FROM `orders` WHERE order_id = 1;