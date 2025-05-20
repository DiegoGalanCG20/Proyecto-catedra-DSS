CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    stock INT,
    category VARCHAR(50),
    image_url TEXT
);

INSERT INTO products (name, price, stock, category, image_url) VALUES
('Martillo', 10.00, 10, 'Ferretería', 'https://via.placeholder.com/100?text=Martillo'),
('Clavos', 2.00, 50, 'Ferretería', 'https://via.placeholder.com/100?text=Clavos'),
('Laptop', 500.00, 5, 'Electrónica', 'https://via.placeholder.com/100?text=Laptop'),
('Mouse', 20.00, 15, 'Electrónica', 'https://via.placeholder.com/100?text=Mouse'),
('Camisa', 15.00, 30, 'Ropa', 'https://via.placeholder.com/100?text=Camisa');
