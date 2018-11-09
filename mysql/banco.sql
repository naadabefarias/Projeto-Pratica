drop database if exists ponto;
create database if not exists ponto;

use ponto;

CREATE TABLE `Users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `pontos_turisticos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `aval_id` int(11) NOT NULL,
 `nome_ponto` varchar(200) NOT NULL,
 `logradouro` varchar(200) NOT NULL,
 `bairro` varchar(200) NOT NULL,
 `numero_ponto` varchar(50) DEFAULT NULL,
 `imagem` varchar(100) NOT NULL,
 `descricao` varchar(200) NOT NULL,
 `categoria` enum('praia', 'rio', 'praca', 'museu', 'monumento', 'igreja','naturezaparques') NOT NULL,
 PRIMARY KEY (`id`),
 CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `pk_aval` FOREIGN KEY (`aval_id`) REFERENCES `avaliacoes` (`id`)
);

CREATE TABLE `avaliacoes`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `qnt_estrela` INT(11) NOT NULL,
    `modified` DATETIME DEFAULT NULL,
    PRIMARY KEY(`id`)
);