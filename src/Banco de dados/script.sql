-- Active: 1694003461200@@127.0.0.1@3306@saep_database
CREATE DATABASE IF NOT EXISTS saep_database;
use saep_database;

USE saep_database;

CREATE TABLE
IF NOT EXISTS usuarios (
id INT(11) NOT NULL AUTO_INCREMENT,
login VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS atividades (
id INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
funcionario VARCHAR(255) NOT NULL,
detalhes VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);

INSERT INTO usuarios (login, senha) VALUES ('lamb', 'lamb');