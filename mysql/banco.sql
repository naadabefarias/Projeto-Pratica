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
 `nome_ponto` varchar(200) NOT NULL,
 `logradouro` varchar(200) NOT NULL,
 `bairro` varchar(200) NOT NULL,
 `numero_ponto` varchar(50) DEFAULT NULL,
 `imagem` varchar(100) NOT NULL,
 `descricao` varchar(200) NOT NULL,
 `categoria` enum('praia', 'rio', 'praca', 'museu', 'monumento', 'igreja','naturezaparques') NOT NULL,
 PRIMARY KEY (`id`),
 CONSTRAINT `pk_users` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `avaliacoes`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `id_ponto` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `qnt_estrela` INT(11) NOT NULL,
    `modified` DATETIME DEFAULT NULL,
    `desc` varchar(255) NOT NULL,
    PRIMARY KEY(`id`),
    CONSTRAINT `pk_ponto` FOREIGN KEY (`id_ponto`) REFERENCES `pontos_turisticos` (`id`),
    CONSTRAINT `pk_user` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id`)

);