-- The database specified in the .env file will be used for the initialization

CREATE TABLE IF NOT EXISTS example
(
    id         INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name       VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
