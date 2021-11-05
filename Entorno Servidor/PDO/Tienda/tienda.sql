drop table if exists articulos;
drop table if exists categorias;

-- tabla categorias
create table categorias(
    id int AUTO_INCREMENT primary key,
    nombre VARCHAR(100) unique not null,
    descripcion text not null
);
-- tablas articulos
create table articulos(
    id int AUTO_INCREMENT primary key,
    nombre varchar(100) not null,
    precio float(5,2),
    categoria_id int,
    constraint fk_art_cat foreign key(categoria_id) references categorias(id) on delete cascade on update cascade
);