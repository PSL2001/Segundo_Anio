DROP TABLE if exists users;
CREATE TABLE users(
	id int auto_increment primary key,
	username varchar(40) unique not null,
	email varchar(80) unique not null,
	password varchar(120) not null,
	img varchar(100),
	perfil int default 0
);
