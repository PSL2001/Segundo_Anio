create table provincias(
    id int AUTO_INCREMENT PRIMARY key,
    nombre varchar(100) unique,
    descripcion text
);
create table poblaciones(
    id int AUTO_INCREMENT PRIMARY key,
    nombre varchar(100),
    descripcion text,
    imagen varchar(200),
    poblacion int UNSIGNED,
    provincia_id int,
    constraint fk_prov_pob foreign key(provincia_id) REFERENCES provincias(id) on delete cascade
);