-- Generado por Oracle SQL Developer Data Modeler 4.1.1.888
--   en:        2016-10-13 14:35:19 COT
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g




CREATE TABLE Establecimiento
  (
    id_establecimiento INTEGER NOT NULL ,
    nombre             VARCHAR2 (70) NOT NULL ,
    descripcion        VARCHAR2 (500) NOT NULL ,
    direccion          VARCHAR2 (40) NOT NULL ,
    tiempoEntrega      VARCHAR2 (50) NOT NULL ,
    pedidoMinimo       INTEGER NOT NULL ,
    costoDomicilio     INTEGER NOT NULL
  ) ;
ALTER TABLE Establecimiento ADD CONSTRAINT Establecimiento_PK PRIMARY KEY ( id_establecimiento ) ;


CREATE TABLE Pedido
  (
    id_pedido            INTEGER NOT NULL ,
    id_clientefk         INTEGER NOT NULL ,
    id_establecimientofk INTEGER NOT NULL ,
    id_productofk        INTEGER NOT NULL ,
    fecha                DATE NOT NULL ,
    comentarioPedido     VARCHAR2 (500) ,
    subtotal             INTEGER NOT NULL ,
    total                INTEGER NOT NULL
  ) ;
ALTER TABLE Pedido ADD CONSTRAINT Pedido_PK PRIMARY KEY ( id_pedido ) ;


CREATE TABLE Producto
  (
    id_producto    INTEGER NOT NULL ,
    id_categoriafk INTEGER NOT NULL ,
    nombre         VARCHAR2 (300) NOT NULL ,
    descripcion    VARCHAR2 (500) NOT NULL ,
    precio         INTEGER NOT NULL
  ) ;
ALTER TABLE Producto ADD CONSTRAINT Producto_PK PRIMARY KEY ( id_producto ) ;


CREATE TABLE ProductoEstablecimiento
  (
    id_establecimientofk INTEGER NOT NULL ,
    id_productofk        INTEGER NOT NULL
  ) ;
ALTER TABLE ProductoEstablecimiento ADD CONSTRAINT ProductoEstablecimiento_PK PRIMARY KEY ( id_establecimientofk, id_productofk ) ;


CREATE TABLE calificacion
  (
    id_calificacion      INTEGER NOT NULL ,
    id_establecimientofk INTEGER NOT NULL ,
    puntuacion           CHAR (1)
  ) ;
ALTER TABLE calificacion ADD CONSTRAINT calificacion_PK PRIMARY KEY ( id_calificacion ) ;


CREATE TABLE categoria
  (
    id_categoria INTEGER NOT NULL ,
    descripcion  VARCHAR2 (100) NOT NULL
  ) ;
ALTER TABLE categoria ADD CONSTRAINT categoria_PK PRIMARY KEY ( id_categoria ) ;


CREATE TABLE cliente
  (
    id_cliente INTEGER NOT NULL ,
    nombre     INTEGER NOT NULL ,
    email      VARCHAR2 (150) NOT NULL ,
    password   VARCHAR2 (20) NOT NULL
  ) ;
ALTER TABLE cliente ADD CONSTRAINT cliente_PK PRIMARY KEY ( id_cliente ) ;


CREATE TABLE comentario
  (
    id_comentario        INTEGER NOT NULL ,
    id_establecimientofk INTEGER NOT NULL ,
    id_clientefk         INTEGER NOT NULL ,
    descripcion          VARCHAR2 (1000) ,
    fecha                DATE NOT NULL
  ) ;
ALTER TABLE comentario ADD CONSTRAINT comentario_PK PRIMARY KEY ( id_comentario ) ;


CREATE TABLE detallePedido
  (
    id_detallePedido INTEGER NOT NULL ,
    id_pedidofk      INTEGER NOT NULL ,
    cantidad         INTEGER NOT NULL
  ) ;
ALTER TABLE detallePedido ADD CONSTRAINT detallePedido_PK PRIMARY KEY ( id_detallePedido ) ;


CREATE TABLE horario
  (
    id_horario INTEGER NOT NULL ,
    dia        VARCHAR2 (15) NOT NULL ,
    horaInicio INTEGER NOT NULL ,
    horaFin    INTEGER NOT NULL
  ) ;
ALTER TABLE horario ADD CONSTRAINT horario_PK PRIMARY KEY ( id_horario ) ;


CREATE TABLE horarioEstablecimiento
  (
    id_horarioEstablecimiento INTEGER NOT NULL ,
    id_establecimientofk      INTEGER NOT NULL ,
    id_horariofk              INTEGER NOT NULL
  ) ;
ALTER TABLE horarioEstablecimiento ADD CONSTRAINT horarioEstablecimiento_PK PRIMARY KEY ( id_horarioEstablecimiento ) ;


ALTER TABLE ProductoEstablecimiento ADD CONSTRAINT Establecimiento_FK FOREIGN KEY ( id_establecimientofk ) REFERENCES Establecimiento ( id_establecimiento ) ;

ALTER TABLE calificacion ADD CONSTRAINT Establecimiento_FKv2 FOREIGN KEY ( id_establecimientofk ) REFERENCES Establecimiento ( id_establecimiento ) ;

ALTER TABLE comentario ADD CONSTRAINT Establecimiento_FKv3 FOREIGN KEY ( id_establecimientofk ) REFERENCES Establecimiento ( id_establecimiento ) ;

ALTER TABLE horarioEstablecimiento ADD CONSTRAINT Establecimiento_FKv4 FOREIGN KEY ( id_establecimientofk ) REFERENCES Establecimiento ( id_establecimiento ) ;

ALTER TABLE detallePedido ADD CONSTRAINT Pedido_FK FOREIGN KEY ( id_pedidofk ) REFERENCES Pedido ( id_pedido ) ;

ALTER TABLE Pedido ADD CONSTRAINT ProductoEstablecimiento_FK FOREIGN KEY ( id_establecimientofk, id_productofk ) REFERENCES ProductoEstablecimiento ( id_establecimientofk, id_productofk ) ;

ALTER TABLE ProductoEstablecimiento ADD CONSTRAINT Producto_FK FOREIGN KEY ( id_productofk ) REFERENCES Producto ( id_producto ) ;

ALTER TABLE Producto ADD CONSTRAINT categoria_FK FOREIGN KEY ( id_categoriafk ) REFERENCES categoria ( id_categoria ) ;

ALTER TABLE Pedido ADD CONSTRAINT cliente_FK FOREIGN KEY ( id_clientefk ) REFERENCES cliente ( id_cliente ) ;

ALTER TABLE comentario ADD CONSTRAINT cliente_FKv2 FOREIGN KEY ( id_clientefk ) REFERENCES cliente ( id_cliente ) ;

ALTER TABLE horarioEstablecimiento ADD CONSTRAINT horario_FK FOREIGN KEY ( id_horariofk ) REFERENCES horario ( id_horario ) ;


-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                            11
-- CREATE INDEX                             0
-- ALTER TABLE                             22
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
