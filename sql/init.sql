CREATE DATABASE IF NOT EXISTS screendb;

USE screendb;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE screens (
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    created_by INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT fk_created_by
        FOREIGN KEY (created_by) REFERENCES users (id)
);
