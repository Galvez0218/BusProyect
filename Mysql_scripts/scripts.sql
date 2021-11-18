INSERT INTO permisos(AREA, modulo) VALUES ('GENERAL','CLIENTES' );
INSERT INTO permisos_usuarios (id_permiso, dni) VALUES (1,12345678);


--Order
create table pagadorder(
    id int auto_increment primary key,
    fname varchar(70),
    lname varchar(70),
    email varchar(70),
    payment_mode varchar(100),
    precio_total decimal(8,2),
    payment_id int
);

INSERT INTO permisos(fname, lname, email, payment_mode,) VALUES ('GENERAL','CLIENTES' );