-- Script SQL para criação do banco de dados e tabela
CREATE DATABASE IF NOT EXISTS curso_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE curso_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(80) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(80) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salario` decimal(15,2) DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `obs` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `filme` varchar(200) NOT NULL,
  `diretor` varchar(200) NOT NULL,
  `duracao` int(11) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de gêneros
CREATE TABLE generos (
    id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome      VARCHAR(100) NOT NULL,
    descricao VARCHAR(255) NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uk_generos_nome (nome)
) ENGINE=InnoDB;

-- Tabela de livros
CREATE TABLE livros (
    id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
    titulo           VARCHAR(200) NOT NULL,
    autor            VARCHAR(150) NOT NULL,
    isbn             VARCHAR(20)  NULL,
    ano_publicacao   SMALLINT UNSIGNED NULL,
    sinopse          TEXT NULL,
    capa             VARCHAR(255) NULL,   -- nome do arquivo da capa
    id_genero        INT UNSIGNED NULL,
    criado_em        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uk_livros_isbn (isbn),
    KEY idx_livros_genero (id_genero),
    CONSTRAINT fk_livros_genero
        FOREIGN KEY (id_genero) REFERENCES generos (id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;