CREATE TABLE Users (
    id int auto_increment,
    name varchar(255) NOT NULL,
    user varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);

CREATE TABLE pontos_turisticos(

	id int not null auto_increment,
	nome_ponto varchar(200) not null,
	logradouro varchar(200) not null,
	bairro varchar(200) not null,
	numero_ponto varchar(50),
		constraint pkpontos primary key (id)
        
);