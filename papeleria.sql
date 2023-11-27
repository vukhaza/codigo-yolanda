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

insert into inventario(name, description, price) values
('artTest1', 'Este articulo es solo un articulo de prueba1', 11.99),
('artTest2', 'Este articulo es solo un articulo de prueba2', 12.99),
('artTest3', 'Este articulo es solo un articulo de prueba3', 13.99);

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

insert into usuario(id,nombres,apellido,correo,numero,contrasena,ubicacion) values
(1, 'usrTest', 'testUsr', 'test@user.com', '000111222', 'test', 'testUbication');

-- Tabla orden
create table if not exists orden(
    id int(8) not null AUTO_INCREMENT, -- Aumenta la id automaticamente en 1
    idProd int(8) not null, -- FK | number o int
    cantProd int(5) not null,
    idUsr int(8) not null, -- FK number o int
    monto int(5) not null,
    date datetime not null, 

    primary key (id),
    constraint fkInv foreign key(idProd) references inventario(id),
    constraint fkUsr foreign key(idUsr) references usuario(id)
);
