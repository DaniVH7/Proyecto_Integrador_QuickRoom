.headers on
.mode column
PRAGMA foreign_key = ON
drop table Usuarios;
create table if not exists usuarios(
  uid integer primary key AUTOINCREMENT NOT NULL,
  nombre varchar(250),
  apellidop varchar(250),
  apellidom varchar(250),
  edad integer,
  email varchar(250),
  password varchar(32),
  telefono integer not null,
  status varchar(50) check (status='Activo' or status='Inactivo')
);

CREATE UNIQUE INDEX index_emai ON usuarios(email);

insert into usuarios values(null,'juan','perez','lopez','19','lopez@email.com','102987362hei3j','771392802','Activo');
insert into usuarios values(null,'miguel','kkkk','skkk','20','lopez@email.com','bsbbutwygbxsuy','771338802','Activo');