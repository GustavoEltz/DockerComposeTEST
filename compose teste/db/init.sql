CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);

INSERT INTO users (name, email) VALUES
('Postman da silva', 'postzinhodorola@example.com'),
('Melancia Pereira', 'melanciaBOA@example.com'),
('Gel Antisseptico Barbosa', 'cafécardoso@example.com');
