-- Articulos
insert into inventario(name, description, price) values
('Tijeras', 'Tijeras escolares de un solo filo', 35),
('sacapuntas', 'Instrumento que se utiliza para afinar madera', 5),
('Colores', 'Lapices de varios colores', 50),
('Libretas', 'Hojas impresas o unidas con un espiral', 25),
('Lapiz', 'Lapiz de grafito ordinario', 8),
('Goma', 'Goma de migajon para grafito', 5),
('Marca textos', 'Tipo de marca fluorescente', 10),
('Plumones', 'Tinta de cualquier color', 45),
('Plumas', 'Tinta de color con pinta fina', 10),
('Moño', 'Liston que se utiliza para los regalos', 2),
('Hoja de color', 'Cuidadosa mezcla de celulosa', 34),
('Hoja blanca', 'Papel reciclado multi funcional', 20),
('Silicon en barra', 'Adhesivo termoplástico', 3),
('Plumin permanente', 'Pintura resistente a cualquier cosa', 30),
('Hoja milimetrica', 'Para realizar gráficas', 2),
('Corrector', 'Producto para poner en los errores', 12),
('Diurex', 'Sienta adhesiva para pegar cosas', 10),
('Pintura acrílica', 'Sirve para pintar cuadros o cualquier cosa', 25),
('Papel china', 'Para figuras o decoraciones', 2),
('Papel crepé', 'Manualidades o cualquier otra cosa', 3);
 
-- Usuario
insert into usuario(id,nombres,apellido,correo,numero,contrasena,ubicacion) values
(2, 'admin', 'admin', 'admin@baulito.com', '000111222', 'admin', 'noUbicacion');