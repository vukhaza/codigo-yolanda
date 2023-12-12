-- Es para que no haya valor 0 en las id
set SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- Tabla Inventario
CREATE TABLE IF NOT EXISTS inventario(
    id int(8) not null AUTO_INCREMENT, -- La id aumenta de forma automatica
    name varchar(50) not null, 
    description varchar(50) not null, 
    price float(4,2) not null,
    primary key (id)
);
    --'stock' int(5) not null,  desactivado por que aun no existe un modo de agregar o eliminar existencias

-- Tabla Usuario
create table if not exists usuario(
    id int(8) not null AUTO_INCREMENT, -- Aumenta automaticamente en 1
    nombres varchar(50) not null, 
    apellido varchar(50) not null, 
    correo varchar(50) not null, 
    numero int(8) not null, 
    contrasena varchar(50) not null, 
    ubicacion varchar(80) not null, 
    PRIMARY KEY (id)
);

-- Tabla orden
create table if not exists orden(
    id int(8) not null AUTO_INCREMENT, -- Aumenta la id automaticamente en 1
    idUsr int(8) not null, -- FK number o int
    monto int(5) not null,
    date datetime not null, 

    primary key (id),
    constraint fkUsr foreign key(idUsr) references usuario(id)
);

create table if not exists ordenArticulos(
    id int(8) not null AUTO_INCREMENT,
    idOrden int(8) not null,
    idProd int(8) not null,
    quantity int(5) not null,
    primary key (id),
    constraint fkOrden foreign key(idOrden) references orden(id)
);