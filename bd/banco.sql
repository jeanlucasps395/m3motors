  drop database w3motors;

  create database w3motors;

  use w3motors;



create table veiculos(
  id int auto_increment primary key,
  nome varchar(80),
  marca varchar(80),
  descricao varchar(150),
  ano varchar(10),
  valor decimal(8,2),
  km int,
  imagem varchar(50),
  dataCadastro date,
  carroAtivo boolean
);

create table noticias(
  id_noticia int auto_increment primary key,
  titulo varchar(80),
  conteudo text,  
  dataCadastro date,
  imagem varchar(50),
  noticiaAtiva boolean
);

create table leads_email(
  id_lead int auto_increment primary key,
  email varchar(100),
  dataCadastro date
);

-- Admin
create table admin(
  id_admin int auto_increment primary key,
  usuario varchar(150),
  senha varchar(150)
);

insert into admin values ('','admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef');












