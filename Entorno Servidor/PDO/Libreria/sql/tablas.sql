drop table if exists libros;
DROP Table if exists autores;

-- Tabla autores --
CREATE table autores(
    id int AUTO_INCREMENT primary key,
    nombre varchar(80) not null,
    apellidos varchar(100) not null, 
    pais varchar(80) not null
);

-- Tabla Libros --
CREATE table libros(
    id int AUTO_INCREMENT primary key,
    titulo varchar(100) NOT NULL,
    sipnosis text not NULL,
    isbn varchar(13) UNIQUE NOT NULL,
    autor_id int,
    constraint fk_libro_autor FOREIGN KEY(autor_id) REFERENCES autores(id) on DELETE cascade on UPDATE cascade
); 