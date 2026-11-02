create database if not exists banco_de_herois_liga;
use banco_de_herois_liga;

create table ahqs(
	id int not null auto_increment,
    nome varchar(60) not null,
    ano year not null,
    url_link varchar(2048) not null,
    origem text not null,
    identidade_secreta varchar(45) not null,
    equipe varchar(60) not null,
    classificacao enum('urbano', 'cósmico', 'ômega', 'velocista', 'amazona', 'lanterna', 'mágico', 'mitológico', 'cientista') not null,
    primary key(id)
);
