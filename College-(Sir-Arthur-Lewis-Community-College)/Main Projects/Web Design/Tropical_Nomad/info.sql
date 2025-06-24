CREATE DATABASE 1tropical_nomad;
USE 1tropical_nomad;

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  pwd VARCHAR(400) NOT NULL -- Store hashed passwords
);

CREATE TABLE tour_types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type_name VARCHAR(100) NOT NULL
);

CREATE TABLE tours (
  id INT AUTO_INCREMENT PRIMARY KEY,
    type_id INT,
  tour_name VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  tour_date DATE NOT NULL,
  price DECIMAL(10,2) NOT NULL,

  FOREIGN KEY (type_id) REFERENCES tour_types(id)
);

CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20) NOT NULL
);

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tour_id INT,
  customer_id INT,
  booking_date DATE NOT NULL,
  status ENUM('Confirmed', 'Cancelled', 'Pending') DEFAULT 'Pending',
  FOREIGN KEY (tour_id) REFERENCES tours(id),
  FOREIGN KEY (customer_id) REFERENCES customers(id)
);



INSERT INTO admins (username, pwd) 
VALUES 
('Alpha', MD5('000'));

--Admins to register: ('Arianna', MD5('ari123')), ('Zwayde', MD5('wayd456')), ('Henri', MD5('hen789')), ('Trey', MD5('tre101'));

INSERT INTO tour_types (type_name) 
VALUES 
('Waterfall'), 
('Mountain'), 
('Coastal');

INSERT INTO tours (type_id, tour_name, description, tour_date, price)
VALUES 
(1, 'Diamond Falls Hike', 'A guided hike to a hidden waterfall, swimming and picnic included.', '2024-07-05', 120.00),
(2, 'Pitons Trek Adventure', 'Climb the iconic Pitons with breathtaking views.', '2024-07-08', 200.00),
(3, 'Coastal Sunset Cruise', 'Relax on a yacht cruise along the west coast.', '2024-07-10', 150.00),
(1, 'Twin Falls Exploration', 'Visit two of the island’s most beautiful waterfalls in one trip.', '2024-07-15', 130.00),
(3, 'Snorkeling and Beach Tour', 'Explore coral reefs and relax on the beach afterward.', '2024-07-20', 110.00);


INSERT INTO customers (fname, lname, email, phone) VALUES
('Alice', 'Wonder', 'alice@gmail.com', '758-451-1234'),
('John', 'Deer', 'john@gmail.com', '758-452-5678'),
('Jane', 'Doe', 'jane@gmail.com', '758-453-9012'),
('Adam', 'Apple', 'adam@gmail.com', '758-454-3456'),
('Eve', 'Pomme', 'emily@gmail.com', '758-455-7890');

INSERT INTO bookings (tour_id, customer_id, booking_date, status) VALUES
(3, 5, '2025-04-10', 'confirmed'),
(2, 1, '2025-04-11', 'pending'),
(5, 4, '2025-04-12', 'confirmed'),
(4, 3, '2025-04-13', 'cancelled'),
(1, 2, '2025-04-14', 'confirmed');

