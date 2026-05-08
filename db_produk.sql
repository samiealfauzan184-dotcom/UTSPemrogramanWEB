CREATE DATABASE crud_produk;

USE crud_produk;

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    foto VARCHAR(255) NOT NULL
);