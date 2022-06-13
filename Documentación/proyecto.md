# Proyecto Integrador

## 1.1 Definición del problema: 
- En Tulancingo hay muchas habitaciones que esperan a ser habitadas, la problemática llega cuando hay muchos estudiantes que no son del municipio de Tulancingo y quieren estudiar en las instituciones dentro del municipio, la mejor opción es rentar una habitación que cuente con lo indispensable para subsistir y se adapte a su economía. Un problema mucho más grande, es la inseguridad dentro del municipio, ya que con el tiempo se ha visto mucha delincuencia, este es un factor para que los estudiantes quieran rentar cerca de donde van a estudiar, ahorrarán tiempo, dinero y estarán un poco más seguros.

## 1.2 Definición del proyecto:
 - En nuestra aplicación va enfocada a estudiantes ingresados en la utec que no son de Tulancingo o que radican en Tulancingo pero que les quede lejos la escuela, nuestra aplicación les ayudara a buscar una habitación que cuente con lo necesaria para subsistir deacuerdo a sus necesidades.

 ## 1.3 Definición de las funciones del proyecto:
  - Las funciones que va a llevar nuestra aplicación es que al ingresar nos pida que introduzcamos el usuario y contraseña, en el inicio mostrara las habitaciones que se están disponibles, también traerá apartados como seguridad, formas de pago, ayuda, en el apartado de seguridad traerá una opción en donde los padres de los estudiantes puedan monitorear a sus hijos para ver o notificar si el estudiante cumple con los pagos, sobre su comportamiento dentro de la habitación. Nuestra aplicación va a facilitar a los padres en saber sobre su comportamiento de sus hijos.

  ## 1.4 Diseño de la base de datos (Diagrama entidad - relación)
  ![image](https://lh3.googleusercontent.com/fS7QbgTvbTlYkYy1Dxmrm4QzXsGthIkU1FAe6ZyJpC1DjSpLyEgBXtM5IM-MLoScF_nknLM=s170)
)

  ## 1.5 Creación de la base de datos (Script)
  ### Tabla Usuarios
  ~~~ SQl
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
~~~
### Tabla de Administrador
~~~SQl
.headers on
.mode column
PRAGMA foreign_key = ON; 
CREATE TABLE admin(
  aid integer primary key AUTOINCREMENT,
  nombre varchar(250),
  apellidop varchar(250),
  apellidom varchar(250),
  email varchar(250),
  password varchar(32),
  status varchar(50) check(status='activo' or status='inactivo')
);
~~~
### Tabla Provedor
~~~SQl
.headers on
.mode column
PRAGMA foreign_key = ON
create table proveedor(
  idprov integer primary key AUTOINCREMENT,
  nombreprov varchar(260),
  email varchar(350),
  telefono int
  idD INTEGER NOT NULL REFERENCES  direccion(idD)
);
CREATE UNIQUE INDEX index_proveedor_email ON proveedor(nombreprov,email);
~~~
### Tabla direccion
~~~SQL
create table direccion(
    idD INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    estado varchar(250),
    municipio varchar(250),
    colonia varchar(250),
    calle varchar(250),
    codigo_postal INTEGER NOT NULL
);
~~~
### Tabla Cuartos
~~~SQL
.headers on
.mode column
PRAGMA foreign_key = ON;
drop table cuartos;
create table cuartos(
  cid integer primary key AUTOINCREMENT,
  descripcion varchar(500),
  aid  integer not null REFERENCES admin(aid),
  idprov integer  not null REFERENCES proveedor(idprov)
);
~~~
# 1.6 Diccionario de datos
## - Usuarios
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| Uid | INTEGER |NOT NULL | Clave de Usuario
| Nombre | VARCHAR | 250 | Nombre del Usuario
| Apellido paterno |VARCHAR | 250 | Apellido Paterno del Usuario
| Apellido Materno |VARCHAR | 250 | Apellido Materno del Usuario|
| Edad  |   INTEGER  |NOT NULL | Edad del Usuario
| Email |   VARCHAR |   250 | Email del usuario
| Password  | VARCHAR | 32 | Contraseña del Usuario
| Telefono | INTEGER | NOT NULL | Telefono del Usuario
| Status    |VARCHAR  | 50 | Permite saber si el usuario esta activo o  no

## - Administrador
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| Aid | INTEGER | NOT NULL | Clavel del Administrador 
| Nombre | VARCHAR | 250 | Nombre del Administrador
| Apellido Paterno | VARCHAR | 250 | Apellido Paterno del Administrador
| Apellido Materno | VARCHAR | 250 | Apellido Materno del Administrador
| Email | VARCHAR | 250 | Email del Administrador
| Password | VARCHAR | 32 | Contraseña del Administrador
| Status | VARCHAR | 50 | Permite saber si el Administrador esta Activo o no

## - Cuartos
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| cid  | INTEGER | NOT NULL | Clave del Cuarto
| Descripcion | VARCHAR | 500 | Da una breve descripcion acerca de la habitacion
| Aid | INTEGER | NOT NULL | Conecta la tabla de Admin y cuartos
| idprov | INTEGER | NOT NULL | Conecta la tabla de proveedor con cuartos

## - Proveedor
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
| idprov | INTEGER | NOT NULL | Clave del Proveedor
| nombre | VARCHAR | 250 | Nombrel Proveedor 
| Email  | VARCHAR | 250 | Email del proveedor
| Telefono | INTEGER | NOT NULL | Muestra el numero celular del proveedor
| Direccion | VARCHAR | 300 | Indica la direccion de el proveedor
|idD | INTEGER | NOT NULL | Conecta la tabla proovedor con direccion

## - Direccion
| Campo | Tipo | Tamaño | Descripcion |
| ----------- | ----------- | -----------| -----------|
|idD  | INTEGER | NOT NULL | Id de la direccion
| Estado | VARCHAR | 250 | Indica el estado donde se ubica el proveedor
| Municipio | VARCHAR | 250 | Indica el municipio donde se ubica el proveedor
| Colonia  | VARCHAR | 250 |  Indica la colonia donde se ubica el proveedor
| Calle  | VARCHAR | 250 |  Indica la calle donde se ubica el proveedor
| Codigo Postal  | INTEGER | NOT NULL | Muestra el CP de la entidad donde se ubica el proveedor

# 1.7 Generación de datos de prueba
- ..\Downloads\usuarios.csv
- ..\Downloads\prov.csv
- ..\Downloads\admin.csv
- ..\Downloads\cuartos.csv


