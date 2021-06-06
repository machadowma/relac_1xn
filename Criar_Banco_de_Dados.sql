
-- relac_1xn

create table pessoa (
 cpf char(11) not null,
 nome varchar(50) not null,
 ender_rua varchar(50),
 ender_uf char(2),
 ender_cidade varchar(50),
 fone_residencial varchar(50), 
 fone_celular varchar(50), 
 primary key(cpf)
);

create table veiculo (
 renavam char(20) not null,
 marca varchar(30),
 modelo varchar(30),
 ano integer,
 cor varchar(30),
 cpf_dono char(11),
 primary key(renavam),
 foreign key (cpf_dono) references pessoa (cpf)
);





