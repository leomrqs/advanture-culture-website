CREATE SCHEMA advanced;

USE advanced;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) UNIQUE,
    preco DECIMAL(10, 2),
    imagem TEXT,
    categoria VARCHAR(255)
);

CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    preco DECIMAL(10, 2),
    imagem TEXT,
    categoria VARCHAR(255),
    nomeAdicionador VARCHAR(255)
);


CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) UNIQUE,
    senha VARCHAR(255) NOT NULL,
    permissao ENUM('admin', 'user'),
    stats ENUM('online','offline') 
);

CREATE TABLE compras (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255),
	preco DECIMAL(10, 2),
    nomeComprador VARCHAR(255)
    );

INSERT INTO produtos (nome, preco, imagem, categoria) VALUES
('Air Pegasus Flash', 375.00, 'img/1.png', 'Esportivo'),
('AdiPower Runner', 650.00, 'img/2.png', 'Casual'),
('Flyknit Racer Edge', 820.00, 'img/3.png', 'Corrida'),
('Ultraboost Trail', 310.00, 'img/4.png', 'Esportivo'),
('ZoomX VaporFly', 560.00, 'img/5.png', 'Corrida'),
('NMD Escape', 430.00, 'img/6.png', 'Corrida'),
('React Infinity', 700.00, 'img/7.png', 'Esportivo'),
('Superstar Elite', 480.00, 'img/8.png', 'Corrida'),
('Adizero Finesse', 395.00, 'img/9.png', 'Corrida'),
('HyperAdapt Challenge', 990.00, 'img/10.png', 'Casual'),
('Air Max Fury', 750.00, 'img/11.png', 'Esportivo'),
('Stan Smith Recon', 525.00, 'img/12.png', 'Casual');