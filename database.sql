USE praktikum_pemweb;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role varchar(50) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- add admin user
-- pastiin paswordnya di hash make generate_hash.php
INSERT INTO users (username, email, password, role)
VALUES ('admin', 'admin@example.com', '12345', 'admin');


