drop database if exists revizzi;

create database revizzi default character set utf8 collate utf8_general_ci;

use revizzi;

drop user if exists 'paulotomazi'@'localhost';

create user 'paulotomazi'@'localhost'

grant select, insert, update, delete on revizzi.* to 'paulotomazi'@'localhost';

create table carro(
placa integer auto_increment primary key,
marca varchar(20) not null,
modelo varchar(20) not null,
servico integer,
obs varchar(50),
foreign key (servico) references servico(id_serv),
);

create table servico(
id_serv integer auto_increment primary key,
servico_desc varchar(50) not null,
);

create table shcedule(
nome varchar(50) not null,
placa integer,
horario date,
primary key(placa),
foreign key (placa) references carro(placa),
);

create table orcamento(
cpf integer,
veiculo integer,
cliente varchar(50) not null,
endereco varchar(50) not null,
telefone varchar(11) not null,
servico integer,
pecas varchar(50),
primary key(cpf, veiculo, servico),
);