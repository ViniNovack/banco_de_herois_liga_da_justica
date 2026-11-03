create database if not exists banco_de_herois_liga;
use banco_de_herois_liga;

create table herois(
	id int not null auto_increment,
    nome varchar(60) not null,
    ano year not null,
    url_link varchar(2048), -- not null
    origem text, -- not null
    identidade_secreta varchar(45) not null,
    equipe varchar(60) not null,
    classificacao enum('urbano', 'cósmico', 'ômega', 'velocista', 'amazona', 'lanterna', 'mágico', 'mitológico', 'cientista') not null,
    primary key(id)
);

insert into herois (nome, ano, identidade_secreta, equipe, classificacao) values
('Superman', 1938, 'Clark Kent', 'Liga da Justiça', 'cósmico'),
('Batman', 1939, 'Bruce Wayne', 'Liga da Justiça', 'urbano'),
('Mulher-Maravilha', 1941, 'Diana Prince', 'Liga da Justiça', 'amazona'),
('Aquaman', 1941, 'Arthur Curry', 'Liga da Justiça', 'mitológico'),
('Flash', 1956, 'Barry Allen', 'Liga da Justiça', 'velocista'),
('Lanterna Verde', 1959, 'Hal Jordan', 'Liga da Justiça', 'lanterna'),
('Caçador de Marte', 1955, 'J''onn J''onzz', 'Liga da Justiça', 'cósmico'),
('Zatanna', 1964, 'Zatanna Zatara', 'Liga da Justiça', 'mágico'),
('Ciborgue', 1980, 'Victor Stone', 'Liga da Justiça', 'cientista'),
('Átomo', 1961, 'Ray Palmer', 'Liga da Justiça', 'cientista'),
('Shazam', 1940, 'Billy Batson', 'Liga da Justiça', 'mágico'),
('Capitão Átomo', 1960, 'Nathaniel Adam', 'Liga da Justiça', 'ômega');