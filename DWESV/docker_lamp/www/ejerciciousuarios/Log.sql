CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    log_type VARCHAR(50) NOT NULL,
    log_date DATETIME NOT NULL,
    log_message TEXT NOT NULL
);